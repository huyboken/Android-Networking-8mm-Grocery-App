package com.example.ps12868_assignment_8mm.OperationRetrofitApi;

import com.example.ps12868_assignment_8mm.Models.CategoryModel;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Users {

    @SerializedName("response")
    private String Response;
    @SerializedName("user_id")
    private String UserId;
    @SerializedName("categories")
    private List<CategoryModel> category;

    public String getResponse() {
        return Response;
    }

    public String getUserId() {
        return UserId;
    }

    public List<CategoryModel> getCategory() {
        return category;
    }
}
