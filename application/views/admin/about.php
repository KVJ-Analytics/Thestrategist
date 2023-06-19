<
<link href="<?php echo base_url(); ?>assets/admin/css/multiimage.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-fileupload.min.css" />
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/script.js"></script>
<body class="skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <div class="content-wrapper">
            <section class="col-lg-12">
                <div class="content-area">
                    <div class="col-md-12">
                        <h2><i class="fa fa-file-text-o"></i>About</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">

                    <form class="cmxform form-horizontal adminex-form" method="post" action="<?php echo base_url();?>index.php/AdminController/edit_about_process/" name="myform" enctype="multipart/form-data">
                
                    <div class="col-md-12">                        
                        <div class="col-sm-12">

                            <?php $success = $this->session->userdata('success');
                                if(isset($success)){
                            ?>
                            <div class="alert alert-success center text-center">
                                <strong><?php  
                                    echo $this->session->userdata('success');
                                    $this->session->unset_userdata('success');?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                            $error = $this->session->userdata('error');
                            $this->session->unset_userdata('error');
                                if(isset($error)){
                            ?>
                            <div class="alert alert-danger center text-center">
                                <strong><?php  
                                    echo $this->session->userdata('error');
                                    $this->session->unset_userdata('error');?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>

                            <div class="form-wrap">
                                <div class="form-wrap-title">
                                    <h3>Edit About</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                <?php 

                                foreach($about_edit1 as $about_edit){

                                    ?>
                                <table>
                                      
                                      
                                        <tr>
                                          <td>Title</td>
                                            <td>:</td>
                                            <td>
                                                 <input type="hidden" name="ids" value="<?php if(isset($about_edit->id)){ echo $about_edit->id; }?>" />
                                                <input id="title" name="about_title1" type="text" value="<?php if(isset($about_edit->title)){echo $about_edit->title;} ?>" required value=""/>
                                        </td>
                                        </tr>
										 <tr>
                                          <td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea2" name="description1" ><?php if(isset($about_edit->content)){ echo $about_edit->content; } ?></textarea></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Image (550px X 410px) MAX 1MB</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                                <input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="userfileImage" data-default-file="<?php echo base_url(); ?>assets/images/uploads/about/<?php if(isset($about_edit->image)){  echo $about_edit->image; }  ?>"  /> <input type="hidden" name="a_image" value="<?php if(isset($about_edit->image)){  echo $about_edit->image; } ?>"></td>
                                        </tr>
                                       
                                        <tr>
                                          <td>Short Description</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea1" name="description2" ><?php if(isset($about_edit->short_desc)){ echo $about_edit->short_desc; } ?></textarea></td>
                                        </tr>
                                       
                                                                       
                                        
                                       
                                    </table>
                                    <?php

                                        }
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                            <ul>
                                <li><input type="submit" name="submit" value="Update" /></li>
                                <li><input type="button" name="submit" value="cancel" class="cancel-btn" /></li>
                                <li><input type="button" name="submit" value="Reset" class="reset-btn" /></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                       </form>
                    <div class="clearfix"></div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>


</body>
</html>