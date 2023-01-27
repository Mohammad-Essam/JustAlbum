<?php $attributes = $attributes->exceptProps(
    ['albums']
); ?>
<?php foreach (array_filter((
    ['albums']
), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Album name</th>
                <th>Number of photos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($album->name); ?></td>
                <td><?php echo e($album->photos_count); ?></td>
                <td style="display: flex;justify-content: center;gap:8px">
                    <a class="control" href="/albums/<?php echo e($album->id); ?>/photos" target="_blank">Open</a>
                    <?php if($album->photos_count > 0): ?>
                    <button onclick="openDialog(<?php echo e($album->id); ?>)" class="control">Delete</button>
                    <?php else: ?>
                    <form method="POST" action="/albums/delete">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="albumToDelete" name="album_id" value=<?php echo e($album->id); ?>>
                        <input class="control" type="submit" value="Delete">
                    </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php /**PATH /media/lap/linux space/Folders/Mohamed/portfolio/projects/album-viewer/resources/views/components/albums_table.blade.php ENDPATH**/ ?>