<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl">Your Tasks</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4 px-6">
        <a href="<?php echo e(route('tasks.create')); ?>" class="text-blue-600 underline">+ Add Task</a>

        <?php if(session('success')): ?>
            <p class="text-green-600 mt-2"><?php echo e(session('success')); ?></p>
        <?php endif; ?>

        <ul class="mt-4 space-y-2">
<?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="border-b pb-2">
        <strong><?php echo e($task->title); ?></strong> – <?php echo e($task->description); ?> <br>
        Due: <?php echo e($task->due_date ?? 'No date'); ?> |
        Status:
        <span class="<?php echo e($task->is_completed ? 'text-green-600' : 'text-red-600'); ?>">
            <?php echo e($task->is_completed ? 'Completed' : 'Pending'); ?>

        </span>

        <div class="mt-2 space-x-2">
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $task)): ?>
                <?php if(!$task->is_completed): ?>
                    <form action="<?php echo e(route('tasks.complete', $task)); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                        <button type="submit" class="text-sm text-green-600">
                            ✔ Mark Complete
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $task)): ?>
                <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="text-sm text-blue-600">✎ Edit</a>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $task)): ?>
                <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-sm text-red-600"
                            onclick="return confirm('Delete task?')">
                        🗑 Delete
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No tasks yet. <a href="<?php echo e(route('tasks.create')); ?>" class="text-blue-600">Add one</a>.</p>
<?php endif; ?>
</ul>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\todo-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>