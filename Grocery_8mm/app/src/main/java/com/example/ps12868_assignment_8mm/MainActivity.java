package com.example.ps12868_assignment_8mm;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.LinearLayout;

import com.blogspot.atifsoftwares.animatoolib.Animatoo;
import com.example.ps12868_assignment_8mm.Adapters.PlateAdapter;
import com.example.ps12868_assignment_8mm.EmailLoginRegister.EmailLoginActivity;
import com.example.ps12868_assignment_8mm.EmailLoginRegister.EmailRegisterActivity;
import com.example.ps12868_assignment_8mm.Models.PlateModel;
import com.example.ps12868_assignment_8mm.PhoneLoginRegister.PhoneLoginActivity;
import com.example.ps12868_assignment_8mm.Sessions.SessionManager;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    private RecyclerView recyclerView;
    private List<PlateModel> plateModelList;
    private PlateAdapter plateAdapter;
    private LinearLayout emailContinue, phoneContine;
    SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //////// app update checker start ////////
        //////// app update checker end ////////

        sessionManager = new SessionManager(this);
        //////// Status bar hide start ////////
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN);
        //////// Status bar hide end ////////

        phoneContine = (LinearLayout) findViewById(R.id.linear1);
        emailContinue = (LinearLayout) findViewById(R.id.linear2);
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        LinearLayoutManager layoutManager = new LinearLayoutManager(this);
        layoutManager.setOrientation(RecyclerView.HORIZONTAL);
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setKeepScreenOn(true);
        recyclerView.setHasFixedSize(true);

        plateModelList = new ArrayList<>();
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));
        plateModelList.add(new PlateModel(R.drawable.one1));

        plateAdapter = new PlateAdapter(plateModelList, this);
        recyclerView.setAdapter(plateAdapter);
        plateAdapter.notifyDataSetChanged();

        //////// call autoScroll start ////////
            autoScroll();
        //////// call autoScroll end ////////
        emailContinue.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, EmailLoginActivity.class);
                startActivity(intent);
                Animatoo.animateSlideDown(MainActivity.this);
            }
        });
        phoneContine.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, PhoneLoginActivity.class);
                startActivity(intent);
                Animatoo.animateSlideDown(MainActivity.this);
            }
        });
    }

    public void autoScroll() {
        final int speedScroll = 1;
        final Handler handler = new Handler();
        final Runnable runnable = new Runnable() {
            int count = 0;

            @Override
            public void run() {
                if (count == plateAdapter.getItemCount())
                    count = 4;
                if (count < plateAdapter.getItemCount())
                    recyclerView.smoothScrollToPosition(++count);
                handler.postDelayed(this, speedScroll);
            }
        };
        handler.postDelayed(runnable, speedScroll);
    }

    public void goToHomePage(View view) {
        Intent intent = new Intent(MainActivity.this, HomeActivity.class);
        startActivity(intent);
        finish();
        Animatoo.animateSwipeLeft(this);
    }

    @Override
    protected void onStart() {
        super.onStart();
        if(sessionManager.isLogin()){
            Intent intent = new Intent(MainActivity.this, HomeActivity.class);
            startActivity(intent);
            finish();
            Animatoo.animateSwipeLeft(this);
        }
        else {

        }
    }
}