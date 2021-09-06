package com.example.ps12868_assignment_8mm.Models;

public class PlateModel {
    public PlateModel() {
        //////// Empty Contructor ////////
    }

    private int plate_image;

    public PlateModel(int plate_image) {
        this.plate_image = plate_image;
    }

    public int getPlate_image() {
        return plate_image;
    }

    public void setPlate_image(int plate_image) {
        this.plate_image = plate_image;
    }
}
