<div id="movePanel">
    <h3>select the album that will have the deleted album's content</h3>
    <table id="table_move" class="display">
    <thead>
        <tr>
            <th>name</th>
            <th>photos</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = \App\Models\Album::all()->except($id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($album->name); ?></td>
            <td><?php echo e($album->photos_count); ?></td>
            <td style="display: flex;justify-content: center;gap:8px">
                <form method="POST" action="/albums/<?php echo e($id); ?>/<?php echo e($album->id); ?>/move-then-delete">
                    <button class="control">Move to this</button>
                    <?php echo csrf_field(); ?>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<button onclick="modalClose();switchToSurePanel()" class="control">Cancel</button>
</div>
<?php /**PATH /media/lap/linux space/Folders/Mohamed/portfolio/projects/album-viewer/resources/views/components/returnedAlbums.blade.php ENDPATH**/ ?>