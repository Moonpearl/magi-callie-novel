<!-- start calendar page  -->
        <div class="title" >
            <h1>Calculate your birthday</h1>
            <?php if (isset($date)): ?>
                <p>You were born on <span class="date"><?= $date->display(); ?></span></p>
                <p>Try another date:
            <?php else: ?>
                <p>Please enter your date of birth:
            <?php endif; ?>

                <form>
                    <label for="month">Month</label>
                    <input id="month" name="month" list="months" required />
                    <label for="day">Day</label>
                    <input id="day" name="day" type="number" min="1" max="31" required />
                    <input type="submit" value="Calculate" method="get" />

                    <datalist id="months">
                        <?php foreach (MidgardDate::GREGORIAN_NAME_MONTH as $name): ?>
                            <option value="<?= $name ?>" />
                        <?php endforeach; ?>
                    </datalist>
                </form>
            </P>
        </div>
<!-- end calendar page -->