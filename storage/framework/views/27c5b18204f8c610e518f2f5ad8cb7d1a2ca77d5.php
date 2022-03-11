<?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
    <td>
        <div class="user-details">
            <div class="user-avatar">
                <img src="<?php echo e($agent->profile_pic); ?>" alt="<?php echo e($agent->first_name); ?>">
            </div>
            <h5><?php echo e($agent->first_name); ?></h5>
        </div>
    </td>
    <td>
        <div class="user-details preview-btn">
            <h5><?php echo e($agent->last_name); ?></h5>
            <a href="<?php echo e(route('agent.show', ['agent' => $agent->id])); ?>" class="preview-btn">Preview</a>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td class="text-center" colspan="2">No Agents Available</td>
</tr>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\opus8\resources\views/ajax/ajax-agents.blade.php ENDPATH**/ ?>