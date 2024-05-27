<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Szachy - Zagraj</title>
    <link rel="stylesheet" href="css/stylejs.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
    <style>
        body {
          display: center;
          justify-content: space-between;
          margin: 0;
          padding: 0;
          height: 100vh;
          font-family: Arial, sans-serif;
        }
    
        #board-container {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          width: 100%;
        }
    
        #board {
          display: grid;
          grid-template-columns: repeat(8, 6vw);
          grid-template-rows: repeat(8, 6vw);
          border: 2px solid #000;
        }
    
        .square {
          width: 100%;
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 4vw;
          cursor: pointer;
        }
    
        .even {
          background-color: #f0d9b5;
        }
    
        .odd {
          background-color: #b58863;
        }

       
        
        a {
            text-decoration: none;
            color: #007bff; 
            font-weight: bold; 
            transition: color 0.3s ease; 
        }

       
        a:hover {
            color: #ff0000; 
        }
   
    

        button {
    display: flex;
    margin-left: 75%;
    font-size: 1.2em;
    margin-top: 20px;
    padding: 10px 20px;
    background: linear-gradient(45deg, #3D2B1F 25%, #A5694F 25%, #A5694F 50%, #3D2B1F 50%, #3D2B1F 75%, #A5694F 75%);
    background-size: 8px 8px;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-position 0.5s ease;
    position: relative;
    overflow: hidden;
}

button:hover {
    background-position: 4px 4px;
}

button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%;
    height: 120%;
    background-color: rgba(255, 255, 255, 0.3);
    transition: transform 0.5s ease;
    transform: translate(-50%, -50%) scale(0);
    border-radius: 50%;
    z-index: 0;
}

button:hover::before {
    transform: translate(-50%, -50%) scale(2);
}

button span {
    position: relative;
    z-index: 1;
}


      </style>

</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><a href="gra.php">Moje Konto</a></div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="index1.php" class="nav__link" data-link>
                <i class="bx bx-home"></i>
                <span class="links_name">Strona główna</span>
            </a>
            <span class="tooltip">Strona główna</span>
        </li>
        <li>
            <a href="Articles.php" class="nav__link" data-link>
                <i class="bx bx-code-block"></i>
                <span class="links_name">Artykuły</span>
            </a>
            <span class="tooltip">Artykuły</span>
        </li>
        <li>
            <a href="Gallery.php" class="nav__link" data-link>
                <i class="bx bx-image"></i>
                <span class="links_name">Zdjęcia mistrzów świata</span>
            </a>
            <span class="tooltip">Zdjęcia mistrzów świata</span>
        </li>
        <li>
            <a href="RobertJamesFischer.php" class="nav__link" data-link>
                <i class="bx bx-user-pin"></i>
                <span class="links_name">Robert James Fischer</span>
            </a>
            <span class="tooltip">Robert James Fischer</span>
        </li>
        <li>
            <a href="AboutAutor.php" class="nav__link" data-link>
                <i class="bx bx-user"></i>
                <span class="links_name">O autorze</span>
            </a>
            <span class="tooltip">O autorze</span>
        </li>
        <li>
            <a href="Contact.php" class="nav__link" data-link>
                <i class="bx bx-mail-send"></i>
                <span class="links_name">Kontakt</span>
            </a>
            <span class="tooltip">Kontakt</span>
        </li>
        <li>
            <a href="szachyJS.php" class="nav__link" data-link>
                <i class="bx bx-game"></i>
                <span class="links_name">Szachy-Zagraj</span>
            </a>
            <span class="tooltip">Szachy-Zagraj</span>
        </li>
    </ul>
</div>

<section >
    <div class="board" id="board"></div>
    <a href="Zasady.php"><button>!!! Zasady Gry !!!</button></a>
  <button onclick="resetGame()">Reset</button>
</section>
<script>
const pieces = [
'♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜',
'♟', '♟', '♟', '♟', '♟', '♟', '♟', '♟',
' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
'♙', '♙', '♙', '♙', '♙', '♙', '♙', '♙',
'♖', '♘', '♗', '♕', '♔', '♗', '♘', '♖',
];

let selectedPiece = null;
let selectedSquare = null;

function createBoard() {
const board = document.getElementById('board');
let squareColor = 'even';

for (let i = 0; i < 64; i++) {
  const square = document.createElement('div');
  square.className = `square ${squareColor}`;
  square.dataset.index = i;
  square.textContent = pieces[i];

  square.addEventListener('click', () => handleSquareClick(i));

  board.appendChild(square);

  squareColor = squareColor === 'even' ? 'odd' : 'even';
  if ((i + 1) % 8 === 0) squareColor = squareColor === 'even' ? 'odd' : 'even';
}
}

function handleSquareClick(index) {
const clickedSquare = document.querySelector(`[data-index="${index}"]`);
const clickedPiece = clickedSquare.textContent.trim();

if (selectedPiece && selectedSquare !== index) {
  const validMove = isMoveValid(selectedSquare, index);

  if (validMove) {
    pieces[index] = selectedPiece;
    pieces[selectedSquare] = ' ';
    updateBoard();
  }

  selectedPiece = null;
  selectedSquare = null;
} else {
  if (clickedPiece !== ' ') {
    selectedPiece = clickedPiece;
    selectedSquare = index;
  }
}
}

function isMoveValid(startIndex, endIndex) {
  const startPiece = pieces[startIndex];
  const endPiece = pieces[endIndex];

  // Sprawdzenie czy pole docelowe jest zajęte przez figurę tego samego koloru uniemożlienie zbicia swojego pionka ,3
  if (
    (startPiece.toUpperCase() === endPiece.toUpperCase() && startPiece !== ' ' && endPiece !== ' ') ||
    (startPiece.toLowerCase() === endPiece.toLowerCase() && startPiece !== ' ' && endPiece !== ' ')
  ) {
    return false; // Ruch niepoprawny - próba zbijania swojej własnej figury
  }

  // Implementacja logiki dla innych ruchów dla różnych rodzajów figur

  return true; // Ruch jest poprawny
}

function updateBoard() {
const squares = document.querySelectorAll('.square');
squares.forEach((square, index) => {
  square.textContent = pieces[index];
});
}

function resetGame() {
      pieces.splice(0, pieces.length, ...[
        '♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜',
        '♟', '♟', '♟', '♟', '♟', '♟', '♟', '♟',
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        '♙', '♙', '♙', '♙', '♙', '♙', '♙', '♙',
        '♖', '♘', '♗', '♕', '♔', '♗', '♘', '♖',
      ]);
      updateBoard();
    }

    createBoard();
</script>

<script>
 let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    searchBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
</script>

</body>
</html>
