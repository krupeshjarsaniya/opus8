<?php $__env->startSection('title', 'Sales Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<meta http-equiv="refresh" content="30">
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="">
            <?php if(isset($agent_info)): ?>
                <div class="remedy-logout-details-block">
                    <h2>Closed a <span>Deal</span></h2>
                    <span class="border-line"></span>
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-6">
                        <div class="remedy-agent-preview-block">
                            <div class="remedy-agent-preview-img">
                                <img src="<?php echo e($agent_info->profile_pic); ?>" alt="<?php echo e($agent_info->first_name); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6">
                        <div>
                            <?php if(isset($agent_info->fee)): ?>
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="<?php echo e($agent_info->fee); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fee">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($agent_info->stage)): ?>
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="<?php echo e($agent_info->stage); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stage">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($agent_info->products)): ?>
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="<?php echo e($agent_info->products); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Products">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($agent_info->owner)): ?>
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="<?php echo e($agent_info->owner); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Owner">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(count($agent_info->agent_songs) >= 1): ?>
                            <div class="remedy-music-player-box-wrapper">
                                <div class="remedy-music-player-user-details">
                                    <audio id="audio-<?php echo e($agent_info->agent_songs[0]->id); ?>" autoplay controls>
                                        <source src="<?php echo e($agent_info->agent_songs[0]->song_url); ?>" type="audio/wav">
                                        <source src="<?php echo e($agent_info->agent_songs[0]->song_url); ?>" type="audio/mpeg">
                                        <source src="<?php echo e($agent_info->agent_songs[0]->song_url); ?>" type="audio/aiff">
                                        <source src="<?php echo e($agent_info->agent_songs[0]->song_url); ?>" type="audio/m4a">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="remedy-logout-details-block remedy-gif-wrapper">
                    <img src="<?php echo e($message); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php if(isset($agent_info) && count($agent_info->agent_songs) >= 1): ?>
<?php $__env->startPush('scripts'); ?>
<script>
    window.addEventListener("DOMContentLoaded", event => {
        const audio = document.querySelector("audio");
        audio.volume = 0.2;
        audio.play();
    });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\opus8\resources\views/agent-zoho-preview.blade.php ENDPATH**/ ?>