<div id="login">
    
    <div id="formulario-login">
        <?php echo $this->Form->create('User', array('class' => 'navbar-form')); ?>
        <div class="titulo">
            REPARACIONES ALLCHAY
        </div>
        <div class="item_login">
            <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Usuario')); ?>    
        </div>
        <div class="item_login">
            <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>  
        </div>
        <div class="item_login">
            <?php echo $this->Form->button('Acceder', array('class' => 'btn btn-success')); ?>    
        </div>
        <?php echo $this->Form->end(); ?>    
    </div>
<style>
    #login {
        background: url('../img/fondo.jpeg') no-repeat center;
        background-size: cover;
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100vh;
    }
    #formulario-login {
            box-sizing: border-box;
    }
    #formulario-login {
        background: rgba(0,0,0,.5);
        text-align: center;
        padding: 1.5em 0;
        position: absolute;
        top: +50%;
        width: 30%;
        margin: 0 auto;
        left: +50%;
        transform: translate(-50%,-50%);
        box-shadow: 2px 2px 8px rgba(255,255,255,.2);
    }
    .item_login {
        margin: 1em 0;
    }
    .form-control {
        text-align: center;
        border-radius: 2px;
    }
    .titulo {
        color: #fff;
        font-weight: bold;
        line-height: 2;
        font-size: 1.4em;
        margin-bottom: .5em;
        text-transform: uppercase;
        border-bottom: 1px solid #FFF;
    }
    #flashMessage {
        position: absolute;
        top: 2em;
        left: +50%;
        transform: translateX(-50%);
        z-index: 1000;
    }
</style>