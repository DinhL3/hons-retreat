<section class="container">
    <div class="order">
        <div class="order__form-wrapper">
            <h1 class="section-header">Order a package</h1>
            <form class="order__form" action="/submit" method="post">
                <!-- 3 radio options for Silver, Gold, and Diamond package -->
                <div class="order__form-radio form-section">
                    <h3 class="form-header">Choose a package type</h3>
                    <input type="radio" id="silver" name="package" value="Silver Package" required checked />
                    <label for="silver">Silver</label>
                    <input type="radio" id="gold" name="package" value="Gold Package" required />
                    <label for="gold">Gold</label>
                    <input type="radio" id="diamond" name="package" value="Diamond Package" required />
                    <label for="diamond">Diamond</label>
                </div>
                <div class="order__package-info form-section">
                    <h3 class="form-header">Package description</h3>
                    <p id="order__package-info__description"></p>
                    <p>Price: <span id="order__package-info__price"></span> GBP per person</p>
                    <p>Children get 25% discount</p>
                </div>
                <div class="form-section order__num-people">
                    <h3 class="form-header">Number of people</h3>
                    <label for="adults">Adults:</label>
                    <input type="number" id="adults" name="adults" value="1" min="1" required>
                    <label for="children">Children:</label>
                    <input type="number" id="children" name="children" value="0" min="0" required>
                </div>

            </form>
        </div>
        <div class="order__summary-wrapper">
            <h2>Summary</h2>
            <p>Adult: <span id="num-adult"></span> x <span id="price-per-adult"></span> £</p>
            <p>Children: <span id="num-children"></span> x <span id="price-per-child"></span> £</p>
            <p>Total (VAT 0%): <span id="price-total-before-vat"></span> £</p>
            <p>VAT (20%): <span id="vat-amount"></span> £</p>
            <p class="summary__price-total">Total: <span id="price-total-after-vat"></span> £</p>
            <a href="#" class="button-dark">Proceed to payment</a>
        </div>
    </div>
</section>