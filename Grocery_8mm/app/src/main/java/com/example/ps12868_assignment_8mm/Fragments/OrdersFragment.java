package com.example.ps12868_assignment_8mm.Fragments;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;

import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.blogspot.atifsoftwares.animatoolib.Animatoo;
import com.example.ps12868_assignment_8mm.Adapters.BannerAdapter;
import com.example.ps12868_assignment_8mm.Adapters.CatAdapter;
import com.example.ps12868_assignment_8mm.Adapters.GreatOffersAdapter;
import com.example.ps12868_assignment_8mm.Adapters.SimpleVerticalAdapter;
import com.example.ps12868_assignment_8mm.MainActivity;
import com.example.ps12868_assignment_8mm.Models.BannerModel;
import com.example.ps12868_assignment_8mm.Models.CategoryModel;
import com.example.ps12868_assignment_8mm.Models.GreatOffersModel;
import com.example.ps12868_assignment_8mm.Models.SimpleVerticalModel;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiClient;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.ApiInterface;
import com.example.ps12868_assignment_8mm.OperationRetrofitApi.Users;
import com.example.ps12868_assignment_8mm.R;
import com.example.ps12868_assignment_8mm.Sessions.SessionManager;
import com.google.android.material.navigation.NavigationView;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class OrdersFragment extends Fragment implements View.OnClickListener {

    public OrdersFragment() {
        // Required empty public constructor
    }

    DrawerLayout drawerLayout;
    ImageView navigationBar;
    NavigationView navigationView;
    private View view;
    private RelativeLayout bookmarks, eightMMGold;
    private TextView login, logout, your_orders, favorite_orders, address_book, online_ordering_help, send_feedback, report_safety_emergency, rate_playstore;
    SessionManager sessionManager;

    //////// category slider start ////////
    private RecyclerView recyclerViewCategory;
    private CatAdapter catAdapter;
    private List<CategoryModel> categoryModelList;
    //////// category slider end ////////

    ///////// banner slider start ////////
    private RecyclerView recyclerViewBanner;
    private BannerAdapter bannerAdapter;
    private List<BannerModel> bannerModelList;
    ///////// banner slider end ////////


    ///////// simple vertical slider start ////////
    private RecyclerView recyclerViewSimple;
    private SimpleVerticalAdapter simpleVerticalAdapter;
    private List<SimpleVerticalModel> simpleVerticalModelList;
    ///////// simple vertical slider end ////////

    //////// great offers horizotall start ////////
    private RecyclerView recyclerViewGreatOffersHorizontall;
    private GreatOffersAdapter greatOffersAdapter;
    private List<GreatOffersModel> greatOffersModelList;
    //////// great offers horizotall end ////////

    //////// great offers vertical slider start ////////
    private RecyclerView greatOffersRecyclerViewVertical;
    //////// great offers vertical slider end ////////

    //////// new arrivals horizontall slider start ////////
    private RecyclerView newArrivalHorizontallRecyclerViev;
    //////// new arrivals horizontall slider end ////////

    //////// new arrivals vertical slider start ////////
    private RecyclerView newArrivalVerticalRecyclerViev;
    //////// new arrivals vertical slider end ////////

    //////// 8mm exclusive vertical slider start ////////
    private RecyclerView exclusiveVerticalRecyclerViev;
    //////// 8mm exclusive vertical slider end ////////

    //////// 8mm exclusive horizontall slider start ////////
    private RecyclerView exclusiveHorizontallRecyclerViev;
    //////// 8mm exclusive horizontall slider end ////////

    //////// api's calling   ////////
    public static ApiInterface apiInterface;

    @Override

    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view = inflater.inflate(R.layout.fragment_orders, container, false);
        sessionManager = new SessionManager(getContext());
        apiInterface = ApiClient.getApiClient().create(ApiInterface.class);
        init();
        onSetNavigationDrawerEvents();
        return view;
    }

    private void init() {

        //////// category model list start ////////
        recyclerViewCategory = (RecyclerView) view.findViewById(R.id.recyclerViewCategory);
        LinearLayoutManager layoutManagerCategory = new LinearLayoutManager(getContext());
        layoutManagerCategory.setOrientation(RecyclerView.HORIZONTAL);
        recyclerViewCategory.setLayoutManager(layoutManagerCategory);

        categoryModelList = new ArrayList<>();
        Call<Users> categoryCall = apiInterface.getCategories();
        categoryCall.enqueue(new Callback<Users>() {
            @Override
            public void onResponse(Call<Users> call, Response<Users> response) {

                categoryModelList = response.body().getCategory();

                catAdapter = new CatAdapter(categoryModelList, getContext());
                recyclerViewCategory.setAdapter(catAdapter);
                catAdapter.notifyDataSetChanged();
            }

            @Override
            public void onFailure(Call<Users> call, Throwable t) {

            }
        });
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Sản phẩm và Thực phẩm"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Rau quả và Trái cây"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Chăm sóc cá nhân"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Mục hộ gia đình"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Nhà và Nhà bếp"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Đồ uống"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Bữa sáng & Sản phẩm từ sữa"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Giá trị tốt nhất"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Mì và Đồ ăn liền"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Nội thất và Nhu cầu nhà ở"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Chăm sóc trẻ"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Chăm sóc thú cưng"));
//        categoryModelList.add(new CategoryModel(R.drawable.black_placeholder, "Thời trang"));


        //////// category model list end ////////

        //////// banner model list start ////////
        recyclerViewBanner = (RecyclerView) view.findViewById(R.id.recyclerViewBanner);
        LinearLayoutManager layoutManagerBanner = new LinearLayoutManager(getContext());
        layoutManagerBanner.setOrientation(RecyclerView.HORIZONTAL);
        recyclerViewBanner.setLayoutManager(layoutManagerBanner);

        bannerModelList = new ArrayList<>();
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));
        bannerModelList.add(new BannerModel(R.drawable.black_placeholder));

        bannerAdapter = new BannerAdapter(bannerModelList,getContext());
        recyclerViewBanner.setAdapter(bannerAdapter);
        bannerAdapter.notifyDataSetChanged();
        //////// banner model list end ////////

        //////// simple vertical slider start ////////
        recyclerViewSimple = (RecyclerView) view.findViewById(R.id.recyclerViewSimple);
        LinearLayoutManager layoutManagerSimpleVerticalSlider = new LinearLayoutManager(getContext());
        layoutManagerSimpleVerticalSlider.setOrientation(RecyclerView.VERTICAL);
        recyclerViewSimple.setLayoutManager(layoutManagerSimpleVerticalSlider);

        simpleVerticalModelList = new ArrayList<>();
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));

        simpleVerticalAdapter = new SimpleVerticalAdapter(simpleVerticalModelList,getContext());
        recyclerViewSimple.setAdapter(simpleVerticalAdapter);
        simpleVerticalAdapter.notifyDataSetChanged();
        //////// simple vertical slider end ////////

        //////// great offers horizotall start ////////
        recyclerViewGreatOffersHorizontall = (RecyclerView) view.findViewById(R.id.recyclerViewGreatOffersHorizontall);
        LinearLayoutManager layoutManagerGreatOffers = new LinearLayoutManager(getContext());
        layoutManagerGreatOffers.setOrientation(RecyclerView.HORIZONTAL);
        recyclerViewGreatOffersHorizontall.setLayoutManager(layoutManagerGreatOffers);

        greatOffersModelList = new ArrayList<>();
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));

        greatOffersAdapter = new GreatOffersAdapter(greatOffersModelList,getContext());
        recyclerViewGreatOffersHorizontall.setAdapter(greatOffersAdapter);
        greatOffersAdapter.notifyDataSetChanged();
        //////// great offers horizotall end ////////

        //////// new great offers vertical slider start ////////
        greatOffersRecyclerViewVertical = (RecyclerView) view.findViewById(R.id.greatOffersRecyclerViewVertical);
        LinearLayoutManager layoutManagerVertivalGreatOffers = new LinearLayoutManager(getContext());
        layoutManagerVertivalGreatOffers.setOrientation(RecyclerView.VERTICAL);
        greatOffersRecyclerViewVertical.setLayoutManager(layoutManagerVertivalGreatOffers);

        simpleVerticalModelList = new ArrayList<>();
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));


        simpleVerticalAdapter = new SimpleVerticalAdapter(simpleVerticalModelList,getContext());
        greatOffersRecyclerViewVertical.setAdapter(simpleVerticalAdapter);
        simpleVerticalAdapter.notifyDataSetChanged();
        //////// new great offers vertical slider end ////////

        //////// new arrival horizontal model list start ////////
        newArrivalHorizontallRecyclerViev = (RecyclerView) view.findViewById(R.id.newArrivalHorizontallRecyclerViev);
        LinearLayoutManager layoutManagerHorizontallNewArrival = new LinearLayoutManager(getContext());
        layoutManagerHorizontallNewArrival.setOrientation(RecyclerView.HORIZONTAL);
        newArrivalHorizontallRecyclerViev.setLayoutManager(layoutManagerHorizontallNewArrival);

        greatOffersModelList = new ArrayList<>();
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));

        greatOffersAdapter = new GreatOffersAdapter(greatOffersModelList,getContext());
        newArrivalHorizontallRecyclerViev.setAdapter(greatOffersAdapter);
        greatOffersAdapter.notifyDataSetChanged();
        //////// new arrival horizontal model list end ////////

        //////// new arrival vertical model list start ////////
        newArrivalVerticalRecyclerViev = (RecyclerView) view.findViewById(R.id.newArrivalVerticalRecyclerViev);
        LinearLayoutManager layoutManagerVerticalNewArrival = new LinearLayoutManager(getContext());
        layoutManagerVerticalNewArrival.setOrientation(RecyclerView.VERTICAL);
        newArrivalVerticalRecyclerViev.setLayoutManager(layoutManagerVerticalNewArrival);

        simpleVerticalModelList = new ArrayList<>();
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));


        simpleVerticalAdapter = new SimpleVerticalAdapter(simpleVerticalModelList,getContext());
        newArrivalVerticalRecyclerViev.setAdapter(simpleVerticalAdapter);
        simpleVerticalAdapter.notifyDataSetChanged();
        //////// new arrival vertical model list end ////////

        //////// exclusive horizontal model list start ////////
        exclusiveHorizontallRecyclerViev = (RecyclerView) view.findViewById(R.id.exclusiveHorizontallRecyclerViev);
        LinearLayoutManager layoutManagerExclusiveHorizontal = new LinearLayoutManager(getContext());
        layoutManagerExclusiveHorizontal.setOrientation(RecyclerView.HORIZONTAL);
        exclusiveHorizontallRecyclerViev.setLayoutManager(layoutManagerExclusiveHorizontal);

        greatOffersModelList = new ArrayList<>();
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));
        greatOffersModelList.add(new GreatOffersModel(R.drawable.black_placeholder, "Ngã ba rau","49 phút","Giảm Giá 30%","3.6"));

        greatOffersAdapter = new GreatOffersAdapter(greatOffersModelList,getContext());
        exclusiveHorizontallRecyclerViev.setAdapter(greatOffersAdapter);
        greatOffersAdapter.notifyDataSetChanged();
        //////// exclusive horizontal model list end ////////

        //////// exclusive vertical model list start ////////
        exclusiveVerticalRecyclerViev = (RecyclerView) view.findViewById(R.id.exclusiveVerticalRecyclerViev);
        LinearLayoutManager layoutManagerExclusiveVertical = new LinearLayoutManager(getContext());
        layoutManagerExclusiveVertical.setOrientation(RecyclerView.VERTICAL);
        exclusiveVerticalRecyclerViev.setLayoutManager(layoutManagerExclusiveVertical);

        simpleVerticalModelList = new ArrayList<>();
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));
        simpleVerticalModelList.add(new SimpleVerticalModel(R.drawable.black_placeholder,"Trung Bắc","Thực phẩm tốt cho sức khỏe","10.000đ mỗi kg | 2 giờ","GIẢM GIÁ 20% - sử dụng mã ZOMATO","Nhà bếp được vệ sinh tốt.","4.6"));


        simpleVerticalAdapter = new SimpleVerticalAdapter(simpleVerticalModelList,getContext());
        exclusiveVerticalRecyclerViev.setAdapter(simpleVerticalAdapter);
        simpleVerticalAdapter.notifyDataSetChanged();
        //////// exclusive vertical model list end ////////
    }

    private void onSetNavigationDrawerEvents() {
        drawerLayout = (DrawerLayout) view.findViewById(R.id.drawerLayout);
        navigationView = (NavigationView) view.findViewById(R.id.navigationView);

        navigationBar = (ImageView) view.findViewById(R.id.navigationBar);

        login = (TextView) view.findViewById(R.id.login);
        logout = (TextView) view.findViewById(R.id.logout);
        bookmarks = (RelativeLayout) view.findViewById(R.id.relativeLayout3);
        eightMMGold = (RelativeLayout) view.findViewById(R.id.relativeLayout4);

        your_orders = (TextView) view.findViewById(R.id.your_orders);
        favorite_orders = (TextView) view.findViewById(R.id.favorite_orders);
        address_book = (TextView) view.findViewById(R.id.address_book);
        online_ordering_help = (TextView) view.findViewById(R.id.online_ordering_help);
        send_feedback = (TextView) view.findViewById(R.id.send_feedback);
        report_safety_emergency = (TextView) view.findViewById(R.id.report_safety_emergency);
        rate_playstore = (TextView) view.findViewById(R.id.rate_playstore);

        navigationBar.setOnClickListener(this);
        login.setOnClickListener(this);
        logout.setOnClickListener(this);
        bookmarks.setOnClickListener(this);
        eightMMGold.setOnClickListener(this);

        your_orders.setOnClickListener(this);
        favorite_orders.setOnClickListener(this);
        address_book.setOnClickListener(this);
        online_ordering_help.setOnClickListener(this);
        send_feedback.setOnClickListener(this);
        report_safety_emergency.setOnClickListener(this);
        rate_playstore.setOnClickListener(this);


    }

    @SuppressLint("NonConstantResourceId")
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.navigationBar:
                drawerLayout.openDrawer(navigationView, true);
                break;
            case R.id.login:
                Login();
                break;
            case R.id.logout:
                Logout();
                break;
            case R.id.relativeLayout3:
                Toast.makeText(getContext(), "bookmarks", Toast.LENGTH_SHORT).show();
                break;
            case R.id.relativeLayout4:
                Toast.makeText(getContext(), "eightMMGold", Toast.LENGTH_SHORT).show();
                break;
            case R.id.your_orders:
                Toast.makeText(getContext(), "your_orders", Toast.LENGTH_SHORT).show();
                break;
            case R.id.favorite_orders:
                Toast.makeText(getContext(), "favorite_orders", Toast.LENGTH_SHORT).show();
                break;
            case R.id.address_book:
                Toast.makeText(getContext(), "address_book", Toast.LENGTH_SHORT).show();
                break;
            case R.id.online_ordering_help:
                Toast.makeText(getContext(), "online_ordering_help", Toast.LENGTH_SHORT).show();
                break;
            case R.id.send_feedback:
                Toast.makeText(getContext(), "send_feedback", Toast.LENGTH_SHORT).show();
                break;
            case R.id.report_safety_emergency:
                Toast.makeText(getContext(), "report_safety_emergency", Toast.LENGTH_SHORT).show();
                break;
            case R.id.rate_playstore:
                Toast.makeText(getContext(), "rate_playstore", Toast.LENGTH_SHORT).show();
                break;
        }
    }

    private void Logout() {
        sessionManager.editor.clear();
        sessionManager.editor.commit();

        Intent intent = new Intent(getContext(), MainActivity.class);
        startActivity(intent);
        getActivity().finish();
        Animatoo.animateSwipeRight(getContext());
    }

    private void Login() {
        Intent intent = new Intent(getContext(), MainActivity.class);
        startActivity(intent);
        getActivity().finish();
        Animatoo.animateSwipeRight(getContext());
    }

    @Override
    public void onStart() {
        super.onStart();
        if (sessionManager.isLogin()) {
            login.setVisibility(View.GONE);
            logout.setVisibility(View.VISIBLE);
        }
    }
}