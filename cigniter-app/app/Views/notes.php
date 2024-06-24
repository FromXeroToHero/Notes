<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notify</title>
    <link rel="stylesheet" href="<?= base_url('style/mainpage.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <a href="/" class="home_link">
            <div class="navbar_left">
                <img class="logo" src="<?= base_url('img/logo2.png') ?>">
                <h2 class="heading--2">Notify</h2>
            </div>
        </a>
        <div class="navbar_right">
            <div class="user_container">
                <div class="user_photo_container">
                    <img class="user_photo" src="<?= base_url('img/user_profile.png') ?>" alt="user photo">
                </div>
                <div class="user_name">
                    <?= $_COOKIE['username'] ?>
                </div>
            </div>
            <form class="btn_logout" method="post" action="<?= site_url('/notes/logout') ?>">
                <input type="submit" name="logout" class="btn" value="Logout" onclick="return confirm('Are you sure?');" />
            </form>
        </div>
    </nav>

    <section class="feed">
        <div class="wrapper">
            <div class="note_create">
                <h2 class="form_heading">
                  Write a note!
                </h2>

                <form class="form_create" name="form_create" method="post" action="<?= isset($is_edit) && $is_edit ? site_url('/notes/update/'.$note['id']) : site_url('/notes/save') ?>" enctype="multipart/form-data" >
                    <input class="form_create_input form_create_title" value="<?= isset($note['title']) ? $note['title'] : '' ?>" type="text" name="title" placeholder="Note Title" required>
                    <textarea class="form_create_input form_create_text" name="text" placeholder="Note Text" rows="10" cols="60"><?= isset($note['text']) ? $note['text'] : '' ?></textarea>
                    <label for="upload" class="upload-label">Select a file</label>
                    <input type="file" id="upload" name="image" class="custom-upload">
                    <input class="form_create_btn" name="submit" type="submit" value="<?= isset($is_edit) && $is_edit ? 'Update Note' : 'Save Note' ?>"/>
                </form>



            </div>

            <div class="search_container">
                <form method="post" action="<?= site_url('/notes/search') ?>">
                    <input type="text" name="searchQuery" class="search">
                    <input type="submit" value="Search">
                </form>
                <a href="<?= site_url('/notes') ?>">See all</a>
            </div>

            <div class="notes">
        <?php if (!empty($notes)){ ?>
            <?php foreach ($notes as $note) { 
                $transformed_text = str_replace(array("\r", "\n"), "<br/>", $note['text']);
                ?>
                
                <div class='note' onclick="showPopup('<?= $note['title']; ?>', '<?= $note['date'] ?>', '<?= $transformed_text; ?>', '<?= $note['image']; ?>')">
                    <div class='note_upper'>

                        <div class='note_title'><?= $note['title'] ?></div>

                        <div class="note_upper--right">
                            <div class='note_date'><?= date("d/m/Y", strtotime($note['date'])); ?></div>
                            <div class="btn--delete"><a href=<?= "notes/delete?id=".$note['id']; ?> onclick="return confirm('Are you sure?')">&#10006;</a></div>
                        </div>

                        <div class="btn--edit">
                            <form name="edit" method="get" action="<?= site_url('notes/edit/'.$note['id']); ?>">
                                <input class="hidden" type="text" name="post_id" value="<?= $note['id'] ?>" readonly="readonly">
                                <input type="submit" name='edit' value="Edit">
                            </form>
                        </div>

                    </div>
                    <?php if (!empty($note['image'])) { ?>
                        <img src="<?php echo base_url($note['image']); ?>" />
                    <?php }; ?>
                    <div class='note_text'><?php echo $transformed_text; ?></div>

                </div>
            <?php }; ?>
        <?php } else { ?>
            <p>Nu există note disponibile.</p>
        <?php } ?>
    </div>

        </div>
    </section>

    <script>
  class Popup {
    constructor() {
        this.popupElement = null;
    }

    createPopup(title, date, text, image) {
        this.popupElement = document.createElement('div');
        this.popupElement.classList.add('popup');

        let content = `
        <div class="popup--wrapper">
            <div class="popup--upper">
                <h2 class="note_title--popup">
                ${title}
                </h2>
                <p class="note_date--popup">
                ${date}
                </p>
            </div>
            <p class="note_text--popup">
            ${text}
            </p>
        `;
        if (image && image.trim() !== "") {
            content += `<img class='note_image--popup' src="${image}" />`;
        }
        content += "</div>";

        this.popupElement.innerHTML = content;

        document.body.appendChild(this.popupElement);

        window.onclick = (e) => {
            if (e.target === this.popupElement) {
                this.hide();
            }
        };
    }

    show(title, date, text, image) {
        this.createPopup(title, date, text, image);
    }

    hide() {
        if (this.popupElement) {
            this.popupElement.remove();
            this.popupElement = null;
        }
    }
}

const showPopup = function(title, date, text, image) {
  const popup = new Popup();
  popup.show(title, date, text, image);
}


</script>

</body>

</html>
