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

public class EmailRegisterActivity extends AppCompatActivity {

    private EditText name, email, password;
    private Button regBtn;
    public static ApiInterface apiInterface;
    String user_id;
    SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_email_register);

        //////// Status bar hide start ////////
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);
        //////// Status bar hide end ////////
        apiInterface = ApiClient.getApiClient().create(ApiInterface.class);
        sessionManager = new SessionManager(this);

        init();
    }

    private void init() {
        name = (EditText) findViewById(R.id.name);
        email = (EditText) findViewById(R.id.email);
        password = (EditText) findViewById(R.id.password);
        regBtn = (Button) findViewById(R.id.button2);

        regBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Registration();
            }
        });
    }

    private void Registration() {
        String user_name = name.getText().toString().trim();
        String user_email = email.getText().toString().trim();
        String user_password = password.getText().toString().trim();

        if (TextUtils.isEmpty(user_name)) {
            name.setError("Bắt buộc nhập Tên!");
        } else if (TextUtils.isEmpty(user_email)) {
            email.setError("Bắt buộc nhập Email!");
        } else if (TextUtils.isEmpty(user_password)) {
            password.setError("Bắt buộc nhập Mật khẩu!");
        } else {
            ProgressDialog dialog = new ProgressDialog(this);
            dialog.setTitle("Đang Đăng Ký...");
            dialog.setMessage("Vui lòng đợi trong khi chúng tôi thêm thông tin đăng ký của bạn");
            dialog.show();
            dialog.setCanceledOnTouchOutside(false);

            Call<Users> call = apiInterface.performEmailRegistration(user_name,user_email,user_password);
            call.enqueue(new Callback<Users>() {
                @Override
                public void onResponse(Call<Users> call, Response<Users> response) {
                    if (response.body().getResponse().equals("ok")) {
                        user_id  = response.body().getUserId();
                        sessionManager.createSession(user_id);

                        Intent intent = new Intent(EmailRegisterActivity.this, EmailLoginActivity.class);
                        startActivity(intent);
                        finish();
                        Animatoo.animateSwipeLeft(EmailRegisterActivity.this);

                        dialog.dismiss();
                    } else if (response.body().getResponse().equals("failed")) {
                        Toast.makeText(EmailRegisterActivity.this, "Đã xảy ra lỗi. Vui lòng thử lại!", Toast.LENGTH_SHORT).show();
                        dialog.dismiss();
                    } else if (response.body().getResponse().equals("already")) {
                        Toast.makeText(EmailRegisterActivity.this, "Email này đã tồn tại, Vui lòng thử một Email khác", Toast.LENGTH_SHORT).show();
                        dialog.dismiss();
                    }
                }

                @Override
                public void onFailure(Call<Users> call, Throwable t) {
                    Toast.makeText(EmailRegisterActivity.this, "Đã xảy ra lỗi. Vui lòng thử lại!", Toast.LENGTH_SHORT).show();
                    dialog.dismiss();
                }
            });
        }
    }

    public void goToLogin(View view) {
        Intent intent = new Intent(EmailRegisterActivity.this, EmailLoginActivity.class);
        startActivity(intent);
        Animatoo.animateSwipeLeft(this);
        finish();
    }

    public void backToMainPage(View view) {
        Intent intent = new Intent(EmailRegisterActivity.this, MainActivity.class);
        startActivity(intent);
        Animatoo.animateSwipeRight(this);
        finish();
    }
}