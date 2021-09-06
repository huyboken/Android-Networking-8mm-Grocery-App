package com.example.ps12868_assignment_8mm.Models;

public class SimpleVerticalModel {
    public SimpleVerticalModel() {

    }
    private int pro_img;
    private String simple_title, simple_description, simple_coupon, simple_quatity, simple_status, simple_rating;

    public SimpleVerticalModel(int pro_img, String simple_title, String simple_description, String simple_coupon, String simple_quatity, String simple_status, String simple_rating) {
        this.pro_img = pro_img;
        this.simple_title = simple_title;
        this.simple_description = simple_description;
        this.simple_coupon = simple_coupon;
        this.simple_quatity = simple_quatity;
        this.simple_status = simple_status;
        this.simple_rating = simple_rating;
    }

    public int getPro_img() {
        return pro_img;
    }

    public void setPro_img(int pro_img) {
        this.pro_img = pro_img;
    }

    public String getSimple_title() {
        return simple_title;
    }

    public void setSimple_title(String simple_title) {
        this.simple_title = simple_title;
    }

    public String getSimple_description() {
        return simple_description;
    }

    public void setSimple_description(String simple_description) {
        this.simple_description = simple_description;
    }

    public String getSimple_coupon() {
        return simple_coupon;
    }

    public void setSimple_coupon(String simple_coupon) {
        this.simple_coupon = simple_coupon;
    }

    public String getSimple_quatity() {
        return simple_quatity;
    }

    public void setSimple_quatity(String simple_quatity) {
        this.simple_quatity = simple_quatity;
    }

    public String getSimple_status() {
        return simple_status;
    }

    public void setSimple_status(String simple_status) {
        this.simple_status = simple_status;
    }

    public String getSimple_rating() {
        return simple_rating;
    }

    public void setSimple_rating(String simple_rating) {
        this.simple_rating = simple_rating;
    }
}
