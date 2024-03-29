<?php $__env->startSection('title', 'Agent List'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="remedy-form-wrapper">
            <div class="remedy-logout-details-block">
                <h2>Agent <span>List</span></h2>
                <span class="border-line"></span>
            </div>
        </div>
        <div class="remedy-agent-list-table-wrapper">
            <div class="text-right add-agent user-details preview-btn">
                <a href="<?php echo e(route('agent.create')); ?>" class="remedy-agent-btn preview-btn">Add <i class="fa fa-plus"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h5>First Name</h5>
                            </th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody id="agent-list">
                        <?php echo $html; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php if($show_loadmore): ?>
        <div class="form-btn-block">
            <button type="submit" class="remedy-login-btn"><span id="load_more">Load More</span> <i><img src="<?php echo e(asset('assets/images/back-arrow-icon.svg')); ?>" alt="remedy"></i></button>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        let page = 1;
        $(".remedy-login-btn").on("click", function() {
            page++;
            $.ajax({
                url: "<?php echo e(url('/agent-loadmore')); ?>?page=" + page,
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                beforeSend: function() {
                    $(".remedy-login-btn #load_more").text("loading");
                    $(".loader_area").addClass("show");
                },
                complete : function() {
                    $(".remedy-login-btn #load_more").text("Load More");
                    $(".loader_area").removeClass("show");
                },
                success: function(response) {
                    if (response.status) {
                        $("#agent-list").append(response.html);
                        if (!response.show_loadmore) {
                            $(".remedy-login-btn").remove();
                        }
                    }
                },
                error: function(error) {
                    var message = null;
                    if (typeof error.responseJSON.errors != "undefined") {
                        $.each(error.responseJSON.errors, function(id, topic) {
                            message = topic[0];
                            return false;
                        });
                    }
                    if (!message) {
                        message = error.responseJSON.message;
                    }
                    toastr.error(message);
                }
            });
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/agent-list.blade.php ENDPATH**/ ?>