<section class="contact-container">
    <!-- Generate a form that request full name, , email address, phone number, and message as well as have a dummy “Send” button-->
    <div class="contact">
        <h1>Contact Us</h1>
        <p>We will get back to you as soon as possible</p>
        <form action="/submit" method="post">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required />
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required />
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required />
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
            <a href="#" class="button-dark">Send</a>
        </form>
    </div>
</section>