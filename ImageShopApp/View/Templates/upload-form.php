<div id="wrapper">
    <div id="header">
        Image upload
    </div>

    <div class="container">
        <div class="left-menu">
            <div class="main-menu">
                <ul>
                    <li><a href="#">Homepage</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <h1>Upload page</h1>
            <form action="/product/post-upload" method="post" enctype="multipart/form-data">
                <label for="upload_image">Upload image</label>
                <input id="upload_image" type="file" name="image" />
                <br />

                <label for="image_title">Image name</label><br />
                <input id="image_title" type="text" value="" name="title" />

                <br />
                <label for="image_description">Description</label><br />
                <input id="image_description" type="text"  value="" name="description" />

                <br />
                <label for="email">Email</label><br />
                <input id="email" type="text" value="" name="email" />

                <br />
                <label for="price">Price</label><br />
                <input id="price" type="number" value="" name="price" />

                <br />
                <label for="camera_specs">Camera specifications</label><br />
                <input id="camera_specs" type="text" value="" name="camera_specs" />

                <br />
                <label for="photographer_name">Photographer name</label><br />
                <input id="photographer_name" type="text" value="" name="photographer" />

                <br />
                <label for="capture_date">Capture date</label><br />
                <input id="capture_date" type="date" value="" name="capture_date" />

                <br />
                <label for="tags">Tags</label><br />
                <select multiple id="tags">
                    <?php foreach ($tagCollection as $tag): ?>
                    <option value=<?=$tag->getTagName()?> >
                        <?=ucfirst($tag->getTagName())?></option>
                    <?php endforeach; ?>
                </select>
                <br />
                <input id="submit_button" type="submit" value="Submit image" />
            </form>
        </div>
        <div style="clear: both;">
        </div>
    </div>

    <div id="footer">
        Author:<br />
        Ciprian-Adrian Muresan<br />
    </div>
</div>

</body>
</html>