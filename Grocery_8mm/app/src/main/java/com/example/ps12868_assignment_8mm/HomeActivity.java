package com.example.ps12868_assignment_8mm;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.view.WindowManager;
import android.widget.FrameLayout;
import android.widget.Toast;

import com.example.ps12868_assignment_8mm.Adapters.CatAdapter;
import com.example.ps12868_assignment_8mm.Fragments.GoOutFragment;
import com.example.ps12868_assignment_8mm.Fragments.GoldFragment;
import com.example.ps12868_assignment_8mm.Fragments.OrdersFragment;
import com.example.ps12868_assignment_8mm.Fragments.VideosFragment;
import com.example.ps12868_assignment_8mm.Models.CategoryModel;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.util.List;

public class HomeActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigation;
    FrameLayout frameLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        //////// changing the color of status bar text color start ////////
        // thay đổi màu của màu văn bản trên thanh trạng thái
        getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        //////// changing the color of status bar text color end ////////

        bottomNavigation = (BottomNavigationView) findViewById(R.id.bottomNavigation);
        bottomNavigation.setOnNavigationItemSelectedListener(navigation);

        //////// replacing by default fragmnet on home activity start ////////
        // Thay đổi bằng Fragment mặc định trên Activity Home
        getSupportFragmentManager().beginTransaction().replace(R.id.frameLayout, new OrdersFragment()).commit();
        //////// replacing by default fragmnet on home activity end ////////
    }
    private BottomNavigationView.OnNavigationItemSelectedListener navigation =
            new BottomNavigationView.OnNavigationItemSelectedListener() {
                @Override
                public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                    Fragment selectedFragment = null;

                    switch (item.getItemId())
                    {
                        case R.id.orders:
                            selectedFragment = new OrdersFragment();
                            break;

                        case R.id.goout:
                            selectedFragment = new GoOutFragment();
                            break;

                        case R.id.gold:
                            selectedFragment = new GoldFragment();
                            break;

                        case R.id.videos:
                            selectedFragment = new VideosFragment();
                            break;
                    }
                    getSupportFragmentManager().beginTransaction().replace(R.id.frameLayout, selectedFragment).commit();
                    return true;
                }
            };
}