<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="contact_us mt-5">
    <h1 class="title">Contact Us</h1>
    <div class="contact_content">
        <img src="/img/tate-no-yuusha.jpg" alt="" />
        <div class="form_group">
            <form>
                <div class="form_group_input">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" />
                </div>
                <div class="form_group_input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" />
                </div>
                <div class="form_group_input">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" />
                </div>
                <div class="form_group_input">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4">

              </textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>