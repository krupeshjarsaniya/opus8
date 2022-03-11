
<?php $__env->startSection('title', 'Agent Preview'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="">
            <div class="remedy-logout-details-block">
                <h2>Agent <span>Preview</span></h2>
                <span class="border-line"></span>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-6">
                    <div class="remedy-agent-preview-block">
                        <div class="remedy-agent-preview-img">
                            <a href="<?php echo e(route('agent.edit', ['agent' => $agent_info->id])); ?>"><img src="<?php echo e($agent_info->profile_pic); ?>" alt="<?php echo e($agent_info->first_name); ?>"></a>
                        </div>
                        <div class="user-details preview-btn d-flex justify-content-center mt-3 ml-5">
                            <div class="mr-3 ml-3">
                                <a class="preview-btn" href="<?php echo e(route('agent.edit', ['agent' => $agent_info->id])); ?>">Edit <i class="fa fa-pencil"></i></a>
                            </div>
                            <div>
                                <a class="preview-btn delete-agent" data-id="<?php echo e($agent_info->id); ?>" href="javascript:void(0);">Delete <i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="remedy-return-back-arrow">
                            <a href="<?php echo e(url('/agent')); ?>"><img src="<?php echo e(asset('assets/images/left-back-arrow-icon.svg')); ?>" alt="remedy">return to the agent list</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="<?php echo e(asset('assets/images/mail-icon.svg')); ?>" alt="remedy"></i>
                                <input type="email" disabled value="<?php echo e($agent_info->email); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ihan@gmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="<?php echo e(asset('assets/images/user-icon.svg')); ?>" alt="remedy"></i>
                                        <input type="text" disabled value="<?php echo e($agent_info->first_name); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ihan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="<?php echo e(asset('assets/images/user-icon.svg')); ?>" alt="remedy"></i>
                                        <input type="text" class="form-control" disabled value="<?php echo e($agent_info->last_name); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Yilmaz">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="<?php echo e(asset('assets/images/shop-icon.svg')); ?>" alt="remedy"></i>
                                <input type="email" disabled value="<?php echo e($agent_info->sales_type); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sales Type">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="<?php echo e(asset('assets/images/percentage-icon.svg')); ?>" alt="remedy"></i>
                                <input type="email" disabled value="<?php echo e($agent_info->sales_percentage); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sales Percentage">
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="<?php echo e(asset('assets/images/user-icon.svg')); ?>" alt="remedy"></i>
                                        <input type="text" disabled value="<?php echo e($agent_info->hour_rate); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hour Rate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="<?php echo e(asset('assets/images/user-icon.svg')); ?>" alt="remedy"></i>
                                        <input type="text" class="form-control" disabled value="<?php echo e($agent_info->sector_of_the_deal); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sector Of The Deal">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="<?php echo e(asset('assets/images/percentage-icon.svg')); ?>" alt="remedy"></i>
                                <input type="text" disabled value="<?php echo e($agent_info->agency_of_deal); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agency Of Deal">
                            </div>
                        </div>
                        


                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    (function() {
        let songs = <?php echo json_encode($agent_info->agent_songs, 15, 512) ?>;
        var playlist = [];
        var t = [];
        console.log(songs);
        songs.forEach(function(song) {
            playlist.push({
                file: song.song_url,
                trackName: song.song_name,
                trackArtist: "<?php echo e($agent_info->first_name); ?>",
                thumb: "<?php echo e($agent_info->profile_pic); ?>"
            });
        });
        t = {
            playlist: playlist,
            // autoPlay: true
        }
        $(".jAudio").jAudio(t);

        if ($(".delete-agent").length >= 1) {
            $(".delete-agent").on("click", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                $.confirm({
                    title: 'Are you sure ?',
                    content: 'Are you sure you want to delete this agent?',
                    type: 'red',
                    buttons: {
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-red',
                            action: function() {
                                var csrf_token = $('meta[name="csrf-token"]').attr("content");
                                let url = '<?php echo e($module_route . "/". $agent_info->id); ?>';
                                $.ajax({
                                    url: url,
                                    method: "DELETE",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    headers: {
                                        "X-CSRF-TOKEN": csrf_token
                                    },
                                    success: function(response, textStatus, jqXHR) {
                                        if (jqXHR.status == 200 || jqXHR.status == 204) {
                                            toastr.success(response.message);
                                            window.location = "<?php echo e(url('/agent')); ?>"
                                        } else {
                                            toastr.success(response.message);
                                        }
                                    },
                                    error: function() {

                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                        }
                    }
                });
            });
        }
    })();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\opus8\resources\views/agent-preview.blade.php ENDPATH**/ ?>