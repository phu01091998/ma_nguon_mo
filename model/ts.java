btnThem.addMouseListener(new MouseAdapter() {
            @Override
            public void mousePressed(MouseEvent e) {

                Object[] oj;
                oj = new Object[4];
                HangModel hang;
                //
                int kt= JOptionPane.showConfirmDialog(rootPane, "Thêm vào Danh Sách","option", JOptionPane.YES_OPTION);
                if(kt == JOptionPane.YES_OPTION) {
                try {
                    hang = cndao.TimKiemMatHang(tenHang.getSelectedItem().toString());
                    
                    //nếu bàn trạng thái trống (0)  => chuyển sang hoạt động (1);
                    String s1 =GiaoDienChinh.tb_DSBan.getValueAt(GiaoDienChinh.tb_DSBan.getSelectedRow(),2).toString();
                    int kt_ban = Integer.parseInt(s1);
                    if(kt_ban== 0) {
                    GiaoDienChinh.tb_DSBan.setValueAt(1,GiaoDienChinh.tb_DSBan.getSelectedRow(), 2);
                    }
                    
                    //kiểm tra trùng món,trả về vị trí hàng trùng món=> sl+= sl gọi thêm; else : trả về -1;
                    
                    int kt1 =kt_trung_mon(hang.getMaHang());
                    if(kt1!=-1){
                        String s2 = GiaoDienChinh.tb_DSMon.getValueAt(kt1, 3).toString();
                        int m = Integer.parseInt(s2);
                        int slchon= Integer.parseInt(Soluong.getText());
                        m=m+slchon;
                        GiaoDienChinh.tb_DSMon.setValueAt(m, kt1, 3);
                        
                        GiaoDienChinh.set_tongtien(); //set lại tổng tiền:
                    }
                    
                    //món không trùng => thêm bình thường;
                    
                    else {
                    oj[0] = hang.getMaHang();
                    oj[1] = hang.getTenHang();
                    oj[2] = hang.getGia();
                    oj[3] = Soluong.getText();
                    GiaoDienChinh.tbmodel_dsMon.addRow(oj);
                    //set lại tổng tiền:
                    GiaoDienChinh.set_tongtien();
                    }
                } catch (SQLException e1) {
                    // TODO Auto-generated catch block
                    e1.printStackTrace();
                }
                }

            }
        });


