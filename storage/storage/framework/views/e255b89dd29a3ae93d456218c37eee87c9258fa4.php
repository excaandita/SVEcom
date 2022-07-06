<?php $__env->startSection('content'); ?>

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login justify-content-center">
          <div class="col-lg-5">
            <h2>
              Belanja hasil karya Mahasiswa, <br />
              menjadi lebih mudah. Daftarkan segera
            </h2>
              <form method="POST" action="<?php echo e(route('register')); ?>" class="mt-3">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input id="name" type="text"
                  v-model="name" 
                  class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  name="name" 
                  value="<?php echo e(old('name')); ?>" 
                  required autocomplete="name" autofocus>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group">
                <label>E-mail</label>
                <input id="email" type="email"
                  v-model="email" 
                  @change="checkForEmailAvailability()"
                  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                  :class="{ 'is-invalid' : this.email_unavailable }" 
                  name="email" 
                  value="<?php echo e(old('email')); ?>" 
                  required autocomplete="email">
                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input id="password" type="password" 
                  class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  name="password" required 
                  autocomplete="new-password">
                      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group">
                <label>Konfirmasi Password</label>
                <input id="password-confirm" 
                  type="password" 
                  class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  name="password_confirmation" required 
                  autocomplete="new-password">
                      <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              
              <div class="form-group">
                <label>Toko</label>
                <p class="text-muted">
                  Apakah anda juga ingin membuka Toko dan memulai berjualan?
                </p>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    type="radio"
                    class="custom-control-input"
                    name="is_store_open"
                    id="openStoreTrue"
                    v-model="is_store_open"
                    :value="true"
                  />
                  <label for="openStoreTrue" class="custom-control-label">
                    Iya, Boleh
                  </label>
                </div>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    type="radio"
                    class="custom-control-input"
                    name="is_store_open"
                    id="openStoreFalse"
                    v-model="is_store_open"
                    :value="false"
                  />
                  <label for="openStoreFalse" class="custom-control-label">
                    Tidak, hanya membeli
                  </label>
                </div>
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Nama Toko</label>
                <input type="text"
                    v-model="store_name"
                    id="store_name"
                    class="form-control <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="store_name"
                    required
                    autocomplete
                    autofocus >
                      <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Kategori</label>
                <select type="category" class="form-control" name="categories_id">
                  <option value="" disabled>Select category</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <button type="submit" 
                class="btn btn-success btn-block mt-4"
                :disabled="this.email_unavailable"
              >
                Daftar Sekarang
              </button>
              <a href="<?php echo e(route('login')); ?>" class="btn btn-signup btn-block mt-4"
                >Sign In Kembali
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>


<?php $__env->startPush('addon-script'); ?>
</script>
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);

  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      /*  */
    },
    methods: {
      checkForEmailAvailability: function() {
        var self = this;
        axios.get('<?php echo e(route('api-register-check')); ?>', {
          params: {
            email: this.email
          }
        })
          .then(function (response) {
            if(response.data == 'Available') {
              self.$toasted.show(
                "Email tersedia untuk digunakan :)",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
                self.email_unavailable = false;

            } else {
              self.$toasted.error(
                "Maaf, email sudah terdaftar. Gunakan email lain untuk mendaftar!!",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
                self.email_unavailable = true;  

            }

            // handle success
            console.log(response);
          });
      }
    },
    data() {
      return {
        name: "Exca Muchlis Andita",
        email: "exca@test.test",
        is_store_open: true,
        store_name: "",
        email_unavailable: false,
      }
    },
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/auth/register.blade.php ENDPATH**/ ?>