<div class="modal modal-newsletter">
    <div class="modal-background"></div>
    <div class="modal-content">
        <button type="button" class="close-modal-btn"><i class="fas fa-times"></i></button>
        <div class="has-text-centered">
            <img class="modal-newsletter-logo" src="{{ asset('img/fearless-logo.svg') }}" alt="Fearless Records logo" />
        </div>
        <div id="mc_embed_signup">
            <form action="https://fearlessrecords.us7.list-manage.com/subscribe/post?u=c4cc82a2e392a08cf1afcbae6&amp;id=4980ff5cfc" method="post"
                  id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate modal-newsletter-form" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <div class="has-text-centered modal-newsletter-description">Join the Fearless family!</div>
                    <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                    <div class="mc-field-group field">
                        <label for="mce-EMAIL" class="label">Email Address <span class="asterisk">*</span>
                        </label>
                        <div class="control">
                            <input type="email" value="" name="EMAIL" class="required email input" id="mce-EMAIL">
                        </div>
                    </div>
                    <div class="mc-field-group field">
                        <label for="mce-FNAME" class="label">First Name </label>
                        <div class="control">
                            <input type="text" value="" name="FNAME" class="input" id="mce-FNAME">
                        </div>
                    </div>
                    <div class="mc-field-group field">
                        <label for="mce-LNAME" class="label">Last Name </label>
                        <div class="control">
                            <input type="text" value="" name="LNAME" class="input" id="mce-LNAME">
                        </div>
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c4cc82a2e392a08cf1afcbae6_4980ff5cfc"
                                                                                              tabindex="-1" value=""></div>
                    <div class="clear control"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button is-primary"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal modal-share-buttons">
    <div class="modal-background"></div>
    <div class="modal-content">
        <button type="button" class="close-modal-btn"><i class="fas fa-times"></i></button>
        <div class="has-text-centered modal-share-description">Share this with friends!</div>
        <div class="columns">
            <div class="column"><a class="launch-share-dialog share-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></div>
            <div class="column"><a class="launch-share-dialog share-twitter" href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></div>
        </div>
    </div>
</div>