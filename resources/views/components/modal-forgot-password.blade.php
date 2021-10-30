 <!-- Modal Reset -->
 <div class="modal fade" id="modalReset" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <div class="bg-gradient-secondary text-center">
                     <img src="{{ asset('assets/img/illustration4.png') }}" class="px-4 w-75" alt="">
                 </div>
                 <div class="p-5">
                     <h2 class=""> Forgot password </h2>
                     <p>Enter your email and we will send you there a link to reset your password</p>
                     <form action="{{ route('reset-password.store') }}" method="POST">
                         @csrf
                         <div class="input-group mb-3">
                             <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                             <input type="email" name="email" class="form-control border-start-0" id="email"
                                 placeholder="Email">
                         </div>
                         <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Modal Reset -->
