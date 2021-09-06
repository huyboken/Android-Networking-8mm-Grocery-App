package com.example.ps12868_assignment_8mm.Adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.ps12868_assignment_8mm.Models.SimpleVerticalModel;
import com.example.ps12868_assignment_8mm.R;

import java.util.List;

public class SimpleVerticalAdapter extends RecyclerView.Adapter<SimpleVerticalAdapter.ViewHolder> {

    private List<SimpleVerticalModel> simpleVerticalModelList;
    private Context context;

    public SimpleVerticalAdapter(List<SimpleVerticalModel> simpleVerticalModelList, Context context) {
        this.simpleVerticalModelList = simpleVerticalModelList;
        this.context = context;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.simple_vertical_slider, viewGroup, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        SimpleVerticalModel simpleVerticalModel = simpleVerticalModelList.get(position);
        Glide.with(context).load(simpleVerticalModel.getPro_img()).into(holder.proImg);
        holder.pro_title.setText(simpleVerticalModel.getSimple_title());
        holder.pro_desc.setText(simpleVerticalModel.getSimple_description());
        holder.pro_quantity.setText(simpleVerticalModel.getSimple_quatity());
        holder.pro_coupon.setText(simpleVerticalModel.getSimple_coupon());
        holder.pro_status.setText(simpleVerticalModel.getSimple_status());
        holder.pro_rating.setText(simpleVerticalModel.getSimple_rating());
    }

    @Override
    public int getItemCount() {
        return simpleVerticalModelList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        private ImageView proImg;
        private TextView pro_title, pro_desc, pro_quantity, pro_coupon, pro_status, pro_rating;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            proImg = (ImageView) itemView.findViewById(R.id.imageView5);
            pro_title = (TextView) itemView.findViewById(R.id.textView3);
            pro_desc = (TextView) itemView.findViewById(R.id.textView4);
            pro_coupon = (TextView) itemView.findViewById(R.id.textView5);
            pro_quantity = (TextView) itemView.findViewById(R.id.textView6);
            pro_status = (TextView) itemView.findViewById(R.id.textView7);
            pro_rating = (TextView) itemView.findViewById(R.id.textView8);
        }
    }
}
