<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Larol - Carrinho</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon">
  <style>
    html {
      height: 100%;
      position: relative;
    }

    body {
      margin: 0;
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">
      <img src="img/favicon2.png" alt="logotipo T.I Lolja" width="100">
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Início</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="mycart.php">Carrinho</a></li>
        <li><a href="cadastro.php">Cadastro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="page-title">Carrinho</div>
    <div class="content">
      <section>
        <table>
          <thead>
            <tr>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Preço</th>
              <th>Subtotal</th>
              <th>Remover</th>
            </tr>
          </thead>
          <tbody id="cart-items">
            <!-- Os itens do carrinho serão adicionados dinamicamente aqui -->
          </tbody>
        </table>
      </section>
      <aside>
        <div class="box">
          <div class="info">
            <div>
              Total de Produtos:
              <span id="total-products">0</span>
            </div>
            <div>
              Total a Pagar:
              <span id="total-price">R$ 0,00</span>
            </div>
          </div>
          <button onclick="checkout()">Finalizar Compra</button>
        </div>
      </aside>
    </div>
  </main>
  <footer>
    <div class="rodape">
      <ul>
        <li><a href="index.html">Início</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="mycart.php">Carrinho</a></li>
        <li><a href="cadastro.php">Cadastro</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </div>
    <div class="rodape">
      <p>Quadra 34 área especial 04</p>
      <p>Brazlândia, Brasília - DF, 72734-000</p>
    </div>
    <div class="rodape">
      <p>Siga as nossas Redes Sociais</p>
      <a href="#"><img src="img/facebook.png" alt="Facebook Larol"></a>
      <a href="#"><img src="img/instagram.png" alt="Instagram Larol"></a>
      <a href="#"><img src="img/youtube.png" alt="Youtube Larol"></a>
    </div>
  </footer>
<script>
  var cartItems = [];

function addToCart(product) {
 
  var existingItem = cartItems.find(function (item) {
    return item.id === product.id;
  });

  if (existingItem) {

    existingItem.quantity++;
  } else {

    cartItems.push(product);
  }

 
  updateCart();
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

function removeItem(id) {
  cartItems = cartItems.filter(function (item) {
    return item.id !== id;
  });

  updateCart();
}

function updateCart() {
  var cartItemsContainer = document.getElementById('cart-items');
  cartItemsContainer.innerHTML = '';

  var totalProducts = 0;
  var totalPrice = 0;

  for (var i = 0; i < cartItems.length; i++) {
    var item = cartItems[i];

    var tr = document.createElement('tr');
    tr.innerHTML = `
      <td class="product">
        <img src="${item.image}" alt="Imagem do produto">
        <div class="info">
          <div class="name">${item.name}</div>
          <div class="category">${item.category}</div>
        </div>
      </td>
      <td>
        <div class="qty">
          <button onclick="decrementQuantity(${item.id})">-</button>
          <span>${item.quantity}</span>
          <button onclick="incrementQuantity(${item.id})">+</button>
        </div>
      </td>
      <td>R$ ${item.price.toFixed(2).replace('.', ',')}</td>
      <td>R$ ${(item.price * item.quantity).toFixed(2).replace('.', ',')}</td>
      <td>
        <button onclick="removeItem(${item.id})" class="remove">Remover</button>
      </td>
    `;

    cartItemsContainer.appendChild(tr);

    totalProducts += item.quantity;
    totalPrice += item.price * item.quantity;
  }

  document.getElementById('total-products').textContent = totalProducts;
  document.getElementById('total-price').textContent = 'R$ ' + totalPrice.toFixed(2).replace('.', ',');
}

function decrementQuantity(id) {
  for (var i = 0; i < cartItems.length; i++) {
    if (cartItems[i].id === id) {
      if (cartItems[i].quantity > 1) {
        cartItems[i].quantity--;
      }
      break;
    }
  }

  updateCart();
}

function incrementQuantity(id) {
  for (var i = 0; i < cartItems.length; i++) {
    if (cartItems[i].id === id) {
      cartItems[i].quantity++;
      break;
    }
  }

  updateCart();
}

function checkout() {
  alert('Compra finalizada!');
}

function init() {
  var cartItemsFromStorage = localStorage.getItem('cartItems');
  if (cartItemsFromStorage) {
    cartItems = JSON.parse(cartItemsFromStorage);
  } else {
    cartItems = [];
  }

  updateCart();
}

init();

</script>
</body>

</html>
