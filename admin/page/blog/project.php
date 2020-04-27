<?php

$query = mysqli_query($db, "SELECT * FROM request ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Project Request</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Tema</th>
                                <th>Jenis Request</th>
                                <th>Kategori Project</th>
                                <th>Deadline Project</th>
                                <th>Difficulty Project</th>
                                <th>Additional</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($query)>0){?>
                            <?php while($row_query = mysqli_fetch_assoc($query)){?>
                            <tr>
                                <td><?= $row_query['waktu'];?></td>
                                <td><?= $row_query['nama'];?></td>
                                <td><?= $row_query['email'];?></td>
                                <td><?= $row_query['telp'];?></td>
                                <td><?= $row_query['alamat'];?></td>
                                <td><?= $row_query['tema'];?></td>
                                <td><?= $row_query['jenis'];?></td>
                                <td><?= $row_query['kategori'];?></td>
                                <td><?= $row_query['deadline'];?></td>
                                <td><?= $row_query['kesulitan'];?></td>
                                <td><?= $row_query['add'];?></td>

                            
                                <td class="center"><a href="index.php?project-delete=<?=$row_query['id'];?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>