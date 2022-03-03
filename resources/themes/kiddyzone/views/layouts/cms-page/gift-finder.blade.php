<!-- <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/custom/bootstrap.min.css') }}"> -->
<section id="gift-finder" class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-xs-12 col-md-12">
            	<div class="heading">
                	<h2>Gift Finder</h2>
                </div>
            </div>
        </div>
        <div class="row bg-blue">
            <div class="col-md-7 finder-form">
                <h2 class="text-center">Please select the following:</h2>
                <form role="form" autocomplete="off" class="form row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option> Choose option </option>
                                    <option value="32">Boy</option>
                                    <option value="33">Girl</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Age Group</label>
                                <select id="age" name="age" class="form-control">
                                    <option> Choose option </option>
                                    <option value="12">0 to 2 years</option>
                                    <option value="13">03 to 04 Years</option>
                                    <option value="14">05 to 07 Years</option>
                                    <option value="30">08 to 10  years</option>
                                    <option value="31">11+ Years</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Budget Range</label>
                                <select id="budget" name="budget" class="form-control">
                                    <option> Choose option </option>
                                    <option value="500">0 to 499</option>
                                    <option value="1000">500 to 1000</option>
                                    <option value="10000">1000+</option>
                                </select>
                            </div>
                        </div>         
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Interests</label>
                                <select id="interests" name="interests" class="form-control">
                                    <option> Choose option </option>
                                    @php
                                        $categories = [];
                                        
                                        foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                                            if ($category->slug)
                                            array_push($categories, $category);
                                        }
                                    @endphp
                                    @foreach($categories as $category_data)
                                        <option value="{{  $category_data->slug }}">{{ $category_data->name }}</option>
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div>         
                    </div>
                    <div class="row submin-button c0l-12">
                    <div class="text-center"><a href="#" onclick="giftCardFilter()" class="bg-yellow btn submit">Find it!</a></div>
                    </div>
            	</form>

            </div>
            
            <div class="col-md-5">
                
                <img src="{{ asset('/themes/kiddyzone/assets/images/kid-with-gift.png') }}">

            </div>
            
          </div>
    </div>
</section>
<script>
  function giftCardFilter() {
    let gender = document.getElementById("gender").value;
    let age = document.getElementById("age").value;
    let budget = document.getElementById("budget").value;
    let interests = document.getElementById("interests").value;
    
    console.log(gender ,age ,budget ,interests);
     
    if (interests != undefined && interests != null) {
        // window.location = '/player_detail?username=' + name;
        window.location = interests+'?shopbyages='+age+'&price=0,'+budget+'&gender='+gender;
    }
    return // whatever you want to do with it
  }
</script>