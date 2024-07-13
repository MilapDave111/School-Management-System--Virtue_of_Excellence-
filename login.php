<?php include("header.php") ?>
<style>
/* code by helpmecoder */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #000;
}
.wrapper:hover {
  position: relative;
  width: 350px;
  height: 450px;
  background: #000;
  box-shadow: 0 0 25px #2d69fc;
  border-radius: 20px;
  padding: 40px;
  overflow: hidden;
  transition: 1s ease-in-out;
}

.form-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  transition: 1s ease-in-out;
}
.wrapper.active .form-wrapper.sign-in {
  transform: translateY(-450px);
}
.wrapper .form-wrapper.sign-up {
  overflow: hidden;
  position: absolute;
  top: 450px;
  left: 0;
}

h2 {
  font-size: 30px;
  color: #fff;
  text-align: center;
}
.input-group {
  position: relative;
  margin: 50px 0;
  border-bottom: 2px solid #fff;
}
.input-group label {
  position: absolute;
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}
.input-group input {
  width: 320px;
  height: 40px;
  font-size: 16px;
  color: #fff;
  padding: 0 5px;
  background: transparent;
  border: none;
  outline: none;
}
.input-group input:focus~label,
.input-group input:valid~label {
  top: -5px;
}

button {
  position: relative;
  width: 100%;
  height: 40px;
  background: #618efc;
  box-shadow: 0 0 10px #618efc;
  font-size: 16px;
  color: #000;
  font-weight: 500;
  cursor: pointer;
  border-radius: 30px;
  border: none;
  outline: none;
}

</style>



<div class="wrapper ">
  <div class="form-wrapper sign-in">
    <form action="actions/login.php" method="POST">
      <h2>Login</h2>
      <div class="input-group">
      <input type="email" id="email"name="email"/>
      <label class="form-label" for="email">Your Email</label>
      </div>
      <div class="input-group">
      <input type="password" id="password"  name="password"/>
      <label class="form-label" for="password">Your Password</label>
      </div>
      
      <button  name="login">Login</button>
      
    </form>
  </div>
  
</div>
<script>
const signInBtnLink = document.querySelector('.signInBtn-link');

const wrapper = document.querySelector('.wrapper');
signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});
signInBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});
</script>


<?php include("footer.php") ?>