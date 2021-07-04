<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <div class="row">
        <div class="col"><h5 style="padding-top: 10px;"><strong>New Ticket</strong></h5></div>
        <div class="col"><button style="text-align: right;" class="c-menu__close">&larr; Close</button></div>
    </div>
    
    
<br />
    <form>
        <div class="form-group">
            <label for="startDate" class="vtInputLabel">Start Date </label>
            <input type="date" class="form-control" id="startDate" placeholder="Pick a date">
        </div>

        <div class="form-group">
            <label for="endDate" class="vtInputLabel">End Date </label>
            <input type="date" class="form-control" id="endDate" placeholder="Pick a date">
        </div>

        <div class="form-group">
            <label for="resPerson" class="vtInputLabel">Responsible Person </label>
            <select class="form-control" id="resPerson">
                <option value="">-- Select an Option --</option>
            </select>
        </div>

        <div class="form-group">
            <label for="socketCode" class="vtInputLabel">Socket Code </label>
            <input type="text" class="form-control" id="socketCode" placeholder="eg. TCP-2012">
        </div>

        <div class="form-group">
            <label for="contactName" class="vtInputLabel">Contact Name </label>
            <input type="text" class="form-control" id="contactName" placeholder="Type a name...">
        </div>

        <div class="form-group">
            <label for="contactPhone" class="vtInputLabel">Contact Phone </label>
            <input type="number" class="form-control" id="contactPhone" placeholder="eg. 1546">
        </div>

        <div class="form-group">
            <label for="comments" class="vtInputLabel">Comments </label>
            <textarea class="form-control" id="comments"></textarea>
        </div>

        <input type="checkbox" class="form-control"> Ticket Already Resolved ? <br /><br />
        <button class="btn btn-primary">Create Ticket</button>
    </form>
  <!-- <ul class="c-menu__items">
    <li class="c-menu__item"><a href="#" class="c-menu__link">Home</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">About</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Services</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Work</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Contact</a></li>
  </ul> -->
</nav><!-- /c-menu slide-left -->

<div id="c-mask" class="c-mask"></div><!-- /c-mask -->