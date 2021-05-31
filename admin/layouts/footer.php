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
        </script>
    </body>
</html>