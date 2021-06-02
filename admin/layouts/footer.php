                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>/public/admin/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>/public/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>/public/admin/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('.table').DataTable( {
                    "language": {
                        "lengthMenu": "Hiển thị _MENU_ dòng trên một trang",
                        "zeroRecords": "Không tìm thấy dữ liệu",
                        "info": "Đang hiển thị trang _PAGE_ của _PAGES_ trang",
                        "infoEmpty": "Không có dữ liệu nào",
                        "search": "Tìm kiếm:",
                        "paginate": {
                            "first":      "Đầu",
                            "last":       "Cuối",
                            "next":       "Tiếp",
                            "previous":   "Trước"
                        },
                    }
                } );  
            } );
            $(document).on('click', '.addMore', function(){
                var html = '<input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="anh[]" width="80%">';
                $(this).parent().prepend(html);
            });
            $(document).on('click', '.removeImage', function(){
                $(this).parent().remove();
            });
        </script>
    </body>
</html>