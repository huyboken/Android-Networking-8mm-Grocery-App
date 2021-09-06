package com.example.ps12868_assignment_8mm.OperationRetrofitApi;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class ApiClient {

    //public static final String BASE_URL = "http://localhost:8080/8mm/";
    public static final String BASE_URL = "http://192.168.0.108:8080/8mm/";
    public static Retrofit retrofit = null;

    public static Retrofit getApiClient() {
        if (retrofit == null){
            retrofit = new Retrofit.Builder().baseUrl(BASE_URL).addConverterFactory(GsonConverterFactory.create()).build();
        }
        return retrofit;
    }
}