package com.example.ps12868_assignment_8mm.EmailLoginRegister;

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
import android.widget.Toast;

import com.blogspot.atifsoftwares.animatoolib.Animatoo;
import com.example.ps12868_assignment_8mm.HomeActivity;
import com.example.ps12868_assignment_8mm.MainActivity;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiClient;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiInterface;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.Users;
import com.example.ps12868_assignment_8mm.PhoneLoginRegister.PhoneLoginActivity;
import com.example.ps12868_assignment_8mm.PhoneLoginRegister.PhoneRegisterActivity;
import com.example.ps12868_assignment_8mm.R;
import com.example.ps12868_assignment_8mm.Sessions.SessionManager;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class EmailLoginActivity extends AppCompatActivity {

    private EditText email, password;
    private Button btnLogin;
    public static ApiInterface apiInterface;
    String user_id;
    SessionManager sessionManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_email_login);

        //////// Status bar hide start ////////
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);
        //////// Status bar hide end ////////
        apiInterface = ApiClient.getApiClient().create(ApiInterface.class);
        sessionManager = new SessionManager(this);

        init();
    }

    private void init() {
        email = (EditText) findViewById(R.id.email);
        password = (EditText) findViewById(R.id.password);
        btnLogin = (Button) findViewById(R.id.button2);

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Login();
            }
        });
    }

    private void Login() {
        String user_email = email.getText().toString().trim();
        String user_password = password.getText().toString().trim();

        if (TextUtils.isEmpty(user_email)) {
            email.setError("Bắt buộc nhập Email!");
        } else if (TextUtils.isEmpty(user_password)) {
            password.setError("Bắt buộc nhập Mật Khẩu!");
        } else {
            ProgressDialog dialog = new ProgressDialog(this);
            dialog.setTitle("Đang Đăng Nhập...");
            dialog.setMessage("Vui lòng đợi trong khi chúng tôi kiểm tra thông tin đăng nhập của bạn");
            dialog.show();
            dialog.setCanceledOnTouchOutside(false);

            Call<Users> call = apiInterface.performEmailLogin(user_email,user_password);
            call.enqueue(new Callback<Users>() {
                @Override
                public void onResponse(Call<Users> call, Response<Users> response) {
                    if (response.body().getResponse().equals("ok")) {
                        user_id  = response.body().getUserId();
                        sessionManager.createSession(user_id);

                        Intent intent = new Intent(EmailLoginActivity.this, HomeActivity.class);
                        startActivity(intent);
                        finish();
                        Animatoo.animateSwipeLeft(EmailLoginActivity.this);
                        Toast.makeText(EmailLoginActivity.this, "Đăng nhập thành công.", Toast.LENGTH_SHORT).show();
                        dialog.dismiss();

                    } else if (response.body().getResponse().equals("no_account")) {
                        Toast.makeText(EmailLoginActivity.this, "Không Tìm Thấy Tài Khoản!.", Toast.LENGTH_SHORT).show();
                        dialog.dismiss();
                    }
                }

                @Override
                public void onFailure(Call<Users> call, Throwable t) {
                    Toast.makeText(EmailLoginActivity.this, "Đã xảy ra lỗi. Vui lòng thử lại!", Toast.LENGTH_SHORT).show();
                    dialog.dismiss();
                }
            });
        }
    }

    public void goToRegister(View view) {
        Intent intent = new Intent(EmailLoginActivity.this, EmailRegisterActivity.class);
        startActivity(intent);
        Animatoo.animateSwipeLeft(this);
        finish();
    }

    public void backToMainPage(View view) {
        Intent intent = new Intent(EmailLoginActivity.this, MainActivity.class);
        startActivity(intent);
        Animatoo.animateSwipeRight(this);
        finish();
    }
}