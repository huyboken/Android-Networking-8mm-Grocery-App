package com.example.ps12868_assignment_8mm.Adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.ps12868_assignment_8mm.Models.BannerModel;
import com.example.ps12868_assignment_8mm.R;

import java.util.List;

public class BannerAdapter extends RecyclerView.Adapter<BannerAdapter.ViewHolder> {

    private List<BannerModel> bannerModelList;
    private Context context;

    public BannerAdapter(List<BannerModel> bannerModelList, Context context) {
        this.bannerModelList = bannerModelList;
        this.context = context;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.layout_banner, viewGroup, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        BannerModel bannerModel = bannerModelList.get(position);
        Glide.with(context).load(bannerModel.getBanner_img()).placeholder(R.drawable.black_placeholder).into(holder.banner_img);
    }

    @Override
    public int getItemCount() {
        return bannerModelList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        private ImageView banner_img;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            banner_img = (ImageView) itemView.findViewById(R.id.banner_img);
        }
    }
}
