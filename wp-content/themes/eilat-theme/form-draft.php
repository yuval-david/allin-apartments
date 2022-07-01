<div class="section-form" id="form">
    <h2> נשמח לשמוע מכם </h2>
    <form id="form_house">
        <div class="inp-div">
            <label> שם מלא* </label>
            <input type="text" placeholder=""/>
        </div>
        <div class="inp-div">
            <label> טלפון* </label>
            <input type="tel" placeholder=""/>
        </div>
        <div class="inp-div">
            <label> דוא"ל </label>
            <input type="email" placeholder=""/>
        </div>
        <div class="inp-div">
            <label> הודעה </label>
            <textarea></textarea>
        </div>

        <input name="from_page" id="from_page" type="hidden" value="<?php echo get_the_title(); ?>"/>

        <button> שליחה </button>

    </form> 
</div>


