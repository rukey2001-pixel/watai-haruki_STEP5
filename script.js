// --関数要素一覧--

const textInput = document.querySelector("#textInput");
const displayButton = document.querySelector("#displayButton");
const addButton = document.querySelector("#addButton");
const changeBgButton = document.querySelector("#changeBgButton");
const displayArea = document.querySelector("#displayArea");
const tableBody = document.querySelector("#tableBody");
const countText = document.querySelector("#countText");


// --設問2：背景色の変更--


// 変更する背景色を配列で用意
const bgColors = ["lightblue", "lightgreen", "lightcoral"];

// 今どの色かを管理する番号
let bgIndex = 0;

changeBgButton.addEventListener("click", function () {
  // body全体の背景色を変更
  document.body.style.backgroundColor = bgColors[bgIndex];

  // 次の色に進める
  bgIndex++;

  // 最後まで行ったら最初に戻す
  if (bgIndex >= bgColors.length) {
    bgIndex = 0;
  }
});


// --設問1・設問3：入力と表示 / ハイライト切り替え--


displayButton.addEventListener("click", function () {
  const inputText = textInput.value;

  // 入力値が空の場合
  if (inputText.trim() === "") {
    alert("入力値が空です。");

    // 表示エリアへの出力も、ハイライト切り替えも行わない
    return;
  }

  // 入力されたテキストを表示エリアに出す
  displayArea.textContent = inputText;

  // highlightクラスを付けたり外したりする
  displayArea.classList.toggle("highlight");
});


// --設問4～6：追加 / 削除 / 最大3件制限--


addButton.addEventListener("click", function () {
  const inputText = textInput.value;

  // trを作成
  const tr = document.createElement("tr");

  // 内容用のtdを作成
  const contentTd = document.createElement("td");
  contentTd.textContent = inputText;

  // 操作用のtdを作成
  const operationTd = document.createElement("td");

  // 削除ボタンを作成
  const deleteButton = document.createElement("button");
  deleteButton.textContent = "削除";

  // 削除ボタンがクリックされたとき
  deleteButton.addEventListener("click", function () {
    tr.remove();

    // 行数表示と表示ボタンの状態を更新
    updateCount();
  });

  // tdの中に削除ボタンを入れる
  operationTd.appendChild(deleteButton);

  // trの中にtdを入れる
  tr.appendChild(contentTd);
  tr.appendChild(operationTd);

  // tbodyの最後にtrを追加
  tableBody.appendChild(tr);

  // 4件目以降が追加されたら、古い行から削除
  while (tableBody.children.length > 3) {
    tableBody.children[0].remove();
  }

  // 行数表示と表示ボタンの状態を更新
  updateCount();
});



// --行数カウント表示を更新する関数--


function updateCount() {
  const rowCount = tableBody.children.length;

  // 現在の行数を表示
  countText.textContent = `現在の行数: ${rowCount}件`;

  // 行数が3件以上なら「表示」ボタンを非表示
  if (rowCount >= 3) {
    displayButton.style.display = "none";
  } else {
    displayButton.style.display = "inline-block";
  }
}



// --設問7：ループ表示--


for (let i = 1; i <= 5; i++) {
  console.log(`ループ回数: ${i}`);
}