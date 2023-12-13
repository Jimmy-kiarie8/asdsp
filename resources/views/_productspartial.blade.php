  
    <div class="search-item-container" >
                            <!-- BEGIN item-row -->
                            <div class="item-row"  > 

   <?php foreach($products as $product):?>
                                <div class="item item-thumbnail" style="margin-bottom:1%;">
                                    <a href="{{url('/ProductsDetails/'.$product->product_code)}}" class="item-image">
                                        <img src="{{ asset('uploads/'.$product->filename)}}" alt="" />
                                        
                                    </a>
                                    <div class="item-info">
                                        <h4 class="item-title">
                                            <a href="{{url('/ProductsDetails/'.$product->product_code)}}">{{$product->product_name}}<br /></a>
                                        </h4>
                                        <p class="item-desc">{{$product->value_name}}</p>
                                        <div class="item-price">Ksh {{$product->product_price}} / {{$product->product_uom}}</div>
                                       
                                    </div>
                                </div>
 <?php endforeach;?>


</div>
</div>


 <div class="text-center">
                            <ul class="pagination m-t-0">
                                {{ $products->withQueryString()->links() }}


                                
                            </ul>
                        </div>