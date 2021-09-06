package com.example.ps12868_assignment_8mm.Adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.ps12868_assignment_8mm.Models.PlateModel;
import com.example.ps12868_assignment_8mm.R;

import java.util.List;

public class PlateAdapter extends RecyclerView.Adapter<PlateAdapter.ViewHolder> {

    private List<PlateModel> plateModelList;
    private Context context;

    public PlateAdapter(List<PlateModel> plateModelList, Context context) {
        this.plateModelList = plateModelList;
        this.context = context;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.layout_plates, viewGroup, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        PlateModel plateModel = plateModelList.get(position);
        Glide.with(context).load(plateModel.getPlate_image()).into(holder.plateImg);
    }

    @Override
    public int getItemCount() {
        return plateModelList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        private ImageView plateImg;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            plateImg = (ImageView) itemView.findViewById(R.id.imageView2);
        }
    }
}
