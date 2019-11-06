

//Chức năng thanh toán:
		btnThanhToan.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
			//kiểm tra bàn được chọn:
				if(tb_DSBan.getSelectedRow()==-1) {
					joption.showMessageDialog(rootPane, "mời chọn bàn trước !!!");
				}
				if(Integer.parseInt(tb_DSBan.getValueAt(tb_DSBan.getSelectedRow(), 2).toString())==-1) {
					joption.showMessageDialog(rootPane, "bàn đang đặt trước !!!");
				}
				if(Integer.parseInt(tb_DSBan.getValueAt(tb_DSBan.getSelectedRow(), 2).toString())==0) {
					joption.showMessageDialog(rootPane, "bàn đang trống !!!");
				}
				else {
					int kt2= joption.showConfirmDialog(rootPane, "Thanh toán và  hóa đơn", "Thông báo", JOptionPane.YES_NO_OPTION);
					if(kt2==JOptionPane.YES_OPTION) {
				//in hóa đơn:
						GD_HoaDon hd = new GD_HoaDon();
						hd.setVisible(true);
				//chuyển trạng thái bàn:
						tb_DSBan.setValueAt(0, tb_DSBan.getSelectedRow(), 2);
				//xóa danh sách hàng:
						DefaultTableModel newtb = new DefaultTableModel();
						tb_DSMon.setModel(newtb);
						tongtien.setText("");
					}
				}
				
			}

		});
