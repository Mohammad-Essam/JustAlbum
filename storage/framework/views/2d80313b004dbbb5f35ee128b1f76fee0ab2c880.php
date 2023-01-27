<script>

function openDialog(album_id)
        {
            modal = document.querySelector('#modal')
            //here i pass the id to the form that i will use to make the post request;
            modal.querySelector("#albumToDelete").value = album_id;
            modal.dataset.album =album_id;

            modalOpen(album_id);
            // modal.classList.add('show');
            // console.log(document.querySelector('#modal'))
        }
        function switchToMovePanel()
        {
            // TODO: make fetch request to get the candidate albums.
            // to 'albums/{album}/move-then-delete end point
            // fetch('albums/'+id+'/move-then-delete').then(x=>console.log(x.resposeText));
            // document.querySelector('#sure').appendChild(responseText);

            document.querySelector('#sure').classList.remove('show');
            document.querySelector('#sure').classList.add('hide');

            document.querySelector('#move').classList.remove('hide');
            document.querySelector('#move').classList.add('show');
        }
        function switchToSurePanel()
        {
            document.querySelector('#sure').classList.remove('hide');
            document.querySelector('#sure').classList.add('show');

            document.querySelector('#move').classList.remove('show');
            document.querySelector('#move').classList.add('hide');
        }
        function modalOpen(id)
        {
            //get the availiable album, to be able to move the current album
            //elements to another
            fetch('/albums/'+id+'/move-then-delete').then(x=>x.text()).then(responseText =>{
                html = document.createElement('div');
                html.innerHTML = responseText;
                child = html.querySelector('#movePanel');
                movePanel = document.querySelector('#move');
                movePanel.innerHTML = "";
                movePanel.appendChild(child);
                $('#table_move').DataTable();
            });
            document.querySelector('#modal').classList.remove('hide');
            document.querySelector('#modal').classList.add('show');
        }
        function modalClose()
        {

            document.querySelector('#modal').classList.add('hide');
            document.querySelector('#modal').classList.remove('show');
        }

</script>

<div data-album="id" data-reciever="" class="modal hide" id="modal">

    <div id="sure" class="sure">
        <p>This album isn't empty one. are you sure you want to delete it with all it's content?</p>
        <div class="controls">
            <form method="POST" action="/albums/delete">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="albumToDelete" name="album_id" value="">
                <input class="control" type="submit" value="Yes">
            </form>
            <button onclick="switchToMovePanel(document.querySelector('#modal').dataset.album)" href="" class="control">Move and Delete</button>
            <button onclick="modalClose()" class="control">Cancel</button>
        </div>
    </div>

    <div id="move" class="hide">
        
    </div>

</div>
<?php /**PATH /media/lap/linux space/Folders/Mohamed/portfolio/projects/album-viewer/resources/views/components/modal.blade.php ENDPATH**/ ?>