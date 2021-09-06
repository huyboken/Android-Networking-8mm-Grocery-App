package com.example.ps12868_assignment_8mm.PhoneLoginRegister;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.blogspot.atifsoftwares.animatoolib.Animatoo;
import com.bumptech.glide.Glide;
import com.example.ps12868_assignment_8mm.EmailLoginRegister.EmailLoginActivity;
import com.example.ps12868_assignment_8mm.EmailLoginRegister.EmailRegisterActivity;
import com.example.ps12868_assignment_8mm.HomeActivity;
import com.example.ps12868_assignment_8mm.MainActivity;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiClient;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiInterface;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.Users;
import com.example.ps12868_assignment_8mm.R;
import com.example.ps12868_assignment_8mm.Sessions.SessionManager;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseException;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.PhoneAuthCredential;
import com.google.firebase.auth.PhoneAuthProvider;

import java.util.concurrent.TimeUnit;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class PhoneLoginActivity extends AppCompatActivity {

    private EditText phone, otp;
    private Button btnLogin, btnOtp;
    public static ApiInterface apiInterface;
    String user_id;
    SessionManager sessionManager;

    //////// phone otp ////////
    private String mVerificationId;
    private PhoneAuthProvider.ForceResendingToken mResendToken;
    private PhoneAuthProvider.OnVerificationStateChangedCallbacks callbacks;
    private FirebaseAuth mAuth;

    ////////
    ImageView dialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_phone_login);

        //////// Status bar hide start ////////
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);
        //////// Status bar hide end ////////
        apiInterface = ApiClient.getApiClient().create(ApiInterface.class);
        mAuth = FirebaseAuth.getInstance();
        sessionManager = new SessionManager(this);
        init();
    }

    private void init() {
        phone = (EditText) findViewById(R.id.phone);
        otp = (EditText) findViewById(R.id.otp);
        btnLogin = (Button) findViewById(R.id.button2);
        btnOtp = (Button) findViewById(R.id.button3);

        //////// prgressdialog start ////////
        dialog = (ImageView) findViewById(R.id.imageView4);
        Glide.with(this).load(R.drawable.loader).into(dialog);
        //////// prgressdialog end ////////

        //////// phone otp callback start ////////
        callbacks = new PhoneAuthProvider.OnVerificationStateChangedCallbacks() {
            @Override
            public void onVerificationCompleted(@NonNull PhoneAuthCredential phoneAuthCredential) {
                signInWithPhoneAuthCredential(phoneAuthCredential);
            }

            @Override
            public void onVerificationFailed(@NonNull FirebaseException e) {

                dialog.setVisibility(View.GONE);
                otp.setVisibility(View.GONE);
                phone.setVisibility(View.VISIBLE);
                btnOtp.setVisibility(View.GONE);
                btnLogin.setVisibility(View.VISIBLE);
                Toast.makeText(PhoneLoginActivity.this, "Số điện thoại không hợp lệ\n" + e.getMessage(), Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onCodeSent(@NonNull String verificationId, @NonNull PhoneAuthProvider.ForceResendingToken token) {
                mVerificationId = verificationId;
                mResendToken = token;

                Toast.makeText(PhoneLoginActivity.this, "Mã đã được gửi, vui lòng kiểm tra và xác minh", Toast.LENGTH_SHORT).show();

                otp.setVisibility(View.VISIBLE);
                phone.setVisibility(View.GONE);
                btnOtp.setVisibility(View.VISIBLE);
                btnLogin.setVisibility(View.GONE);
                dialog.setVisibility(View.GONE);
            }
        };
        //////// phone otp callback end ////////

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String user_phone = phone.getText().toString().trim();
                if (TextUtils.isEmpty(user_phone)) {
                    phone.setError("Bắt buộc nhập Phone!");
                }
                if (user_phone.length() != 10) {
                    phone.setError("Phone phải có 10 số!");
                }
                else {
                    dialog.setVisibility(View.VISIBLE);
                    PhoneAuthProvider.getInstance().verifyPhoneNumber(
                            "+84" + user_phone,  //Số điện thoại để xác minh
                            60,                                            //Thời gian chờ
                            TimeUnit.SECONDS,                                       //Đơn vị thời gian chờ
                            PhoneLoginActivity.this,                     //Activity (Cho ràng buộc callbacks)
                            callbacks                                               //Xác minh thay đổi trạng thái callbacks
                    );
                }
            }
        });
        btnOtp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (otp.getText().toString().equals("")) {
                    Toast.makeText(PhoneLoginActivity.this, "Vui lòng nhập 6 số OTP của bạn.", Toast.LENGTH_SHORT).show();
                }
                if (otp.getText().toString().length() != 6) {
                    Toast.makeText(PhoneLoginActivity.this, "OTP không hợp lệ.", Toast.LENGTH_SHORT).show();
                }
                else {
                    dialog.setVisibility(View.VISIBLE);
                    PhoneAuthCredential credential = PhoneAuthProvider.getCredential(mVerificationId, otp.getText().toString().trim());
                    signInWithPhoneAuthCredential(credential);
                }
            }
        });
    }

    private void signInWithPhoneAuthCredential(PhoneAuthCredential credential) {
        mAuth.signInWithCredential(credential)
                .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if (task.isSuccessful()) {
                            Login();
                        } else {
                            //Toast.makeText(PhoneLoginActivity.this, "Đã xảy ra lỗi. Vui lòng thử lại!", Toast.LENGTH_SHORT).show();
                            dialog.setVisibility(View.GONE);
                        }
                    }
                });
    }


    private void Login() {
        Call<Users> call = apiInterface.performPhoneLogin(phone.getText().toString());
        call.enqueue(new Callback<Users>() {
            @Override
            public void onResponse(Call<Users> call, Response<Users> response) {
                if (response.body().getResponse().equals("ok")) {
                    user_id  = response.body().getUserId();
                    sessionManager.createSession(user_id);

                    Intent intent = new Intent(PhoneLoginActivity.this, HomeActivity.class);
                    startActivity(intent);
                    finish();
                    Animatoo.animateSwipeLeft(PhoneLoginActivity.this);
                    Toast.makeText(PhoneLoginActivity.this, "Đăng nhập thành công.", Toast.LENGTH_SHORT).show();
                    dialog.setVisibility(View.GONE);
                }
                else if (response.body().getResponse().equals("no_account")) {
                    Toast.makeText(PhoneLoginActivity.this, "Không Tìm Thấy Tài Khoản!.", Toast.LENGTH_SHORT).show();
                    dialog.setVisibility(View.GONE);
                }
            }

            @Override
            public void onFailure(Call<Users> call, Throwable t) {
                Toast.makeText(PhoneLoginActivity.this, "Đã xảy ra lỗi. Vui lòng thử lại!", Toast.LENGTH_SHORT).show();
            }
        });
    }

    public void goToRegister(View view) {
        Intent intent = new Intent(PhoneLoginActivity.this, PhoneRegisterActivity.class);
        startActivity(intent);
        Animatoo.animateSlideUp(this);
        finish();
    }

    public void backToMainPage(View view) {
        Intent intent = new Intent(PhoneLoginActivity.this, MainActivity.class);
        startActivity(intent);
        Animatoo.animateSwipeRight(this);
        finish();
    }
}