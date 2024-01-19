 <ul id="nav">
     <li class="current">
         <a href="{{ url('/home') }}">
             <i class="icon-dashboard"></i>
             Dashboard
         </a>
     </li>
     </li>







     <li>
         <a href="javascript:void(0);">
             <i class="icon-table"></i>
             Innovations Module
         </a>
         <ul class="sub-menu">


             <li>
                 <a href="{{ url('/System/InnovationCategories/Index') }}">
                     <i class="icon-angle-right"></i>
                     Innovation Categories
                 </a>
             </li>


             <li>
                 <a href="{{ url('/System/Innovations/Create') }}">
                     <i class="icon-angle-right"></i>
                     Add New Innovation
                 </a>
             </li>

             <li>
                 <a href="{{ url('/System/Innovations/Index') }}">
                     <i class="icon-angle-right"></i>
                     Pending NPS Review
                 </a>
             </li>

             <li>
                 <a href="{{ url('/System/Innovations/Submitted') }}">
                     <i class="icon-angle-right"></i>
                     Reviewed List
                 </a>
             </li>
         </ul>
     </li>




     <li>
         <a href="javascript:void(0);">
             <i class="icon-table"></i>
             Success Stories
         </a>
         <ul class="sub-menu">

             <li>
                 <a href="{{ url('/System/SuccessStories/Create') }}">
                     <i class="icon-angle-right"></i>
                     Add New Success Story
                 </a>
             </li>

             <li>
                 <a href="{{ url('/System/SuccessStories/Index') }}">
                     <i class="icon-angle-right"></i>
                     List of Success Stories
                 </a>
             </li>
         </ul>
     </li>

     <li>
         <a href="javascript:void(0);">
             <i class="icon-list"></i>
             Manage Publications
         </a>
         <ul class="sub-menu">

             <li>
                 <a href="{{ url('/System/Publication/Create') }}">
                     <i class="icon-angle-right"></i>
                     Add New Publication
                 </a>
             </li>

             <li>
                 <a href="{{ url('/System/Publication/Index') }}">
                     <i class="icon-angle-right"></i>
                     List of Publications
                 </a>
             </li>
         </ul>
     </li>


     <?php if(Auth::User()->hasRole(['SuperAdmin'])):?>
     <li>
         <a href="javascript:void(0);">
             <i class="icon-windows"></i>
             System Users
         </a>
         <ul class="sub-menu">

             <li>
                 <a href="{{ url('System/Users/Create') }}">
                     <i class="icon-angle-right"></i>
                     Add New User
                 </a>
             </li>
             <li>
                 <a href="{{ url('System/Users/Index') }}">
                     <i class="icon-angle-right"></i>
                     System Users
                 </a>
             </li>

             <li>
                 <a href="{{ url('System/Roles/Index') }}">
                     <i class="icon-angle-right"></i>
                     System Roles
                 </a>
             </li>

             <li>
                 <a href="{{ url('System/Permissions/Index') }}">
                     <i class="icon-angle-right"></i>
                     System Permissions
                 </a>
             </li>
             <li>
                 <a href="{{ url('System/SystemAudit/Index') }}">
                     <i class="icon-angle-right"></i>
                     System Recent Audits
                 </a>
             </li>

         </ul>


     </li>
     <?php endif;?>



     <li>
        <a href="{{ url('System/reports-upload') }}">
            <i class="icon-angle-right"></i>
            Reports Upload
        </a>
    </li>








 </ul>
