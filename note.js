// JavaScript 文件


let notebooks = [
    { name: "筆記本1", notesLists: [{ id: 1, name: "1", content: "" }, { id: 2, name: "22", content: "" }] },
    { name: "筆記本2", notesLists: [{ id: 3, name: "333", content: "" }, { id: 4, name: "4444", content: "" }] }
];

function createNote(index) {
    const noteName = prompt("請輸入筆記名稱");
    if (noteName) {
        const selectedNotebookIndex = 0;
        const newNote = { id: notebooks[selectedNotebookIndex].notesLists.length + 1, name: noteName, content: '' };
        notebooks[selectedNotebookIndex].notesLists.push(newNote);
        displayNotes();
    }
}


function showandhide(id) {
    var x = document.getElementById('collapse-content' + id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    console.log('这个新的 div 被点击了！');
}

function displayNoteBooks() {
    const accordionContainer = document.getElementById('accordion');
    accordionContainer.innerHTML = '';

    for (let i = 0; i < notebooks.length; i++) {
        const newCollapse = document.createElement('div');
        newCollapse.innerHTML = `
            <input type="checkbox" id="collapse${i}" class="collapse-checkbox">
            <label for="collapse${i}" onclick="showandhide(${i})" class="collapse-label">${notebooks[i].name}</label>
            <div class="collapse-content" id="collapse-content${i}">
                <ul id="notes${i}">
                    <!-- 这里将显示笔记列表 -->
                </ul>
            </div>
        `;
        accordionContainer.appendChild(newCollapse);
    }
}

function createNotebook() {
    const noteName = prompt("請輸入筆記本名稱");

    const newNotebook = {
        name: noteName,
        notesLists: [{ id: 5, name: "55555", content: "" }]
    };

    notebooks.push(newNotebook);
    displayNoteBooks();
    displayNotes();
    displayNoteContent('');
}

// 顯示筆記列表
function displayNotes() {
    for (let i = 0; i < notebooks.length; i++) {
        const notesList = document.getElementById('notes' + i);
        notesList.innerHTML = '';

        const notebook = notebooks[i];
        notebook.notesLists.forEach(note => {
            const li = document.createElement('li');
            li.textContent = `${note.name}`; // 显示笔记名称

            li.classList.add('note-item'); // 新增 class

            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'delete-note-btn';
            deleteBtn.textContent = '刪除';
            deleteBtn.onclick = () => deleteNoteFromNotebook(i, note.id - 1);

            const deleteBtnContainer = document.createElement('div');
            deleteBtnContainer.classList.add('delete-note-btn-container'); // 新增 class
            deleteBtnContainer.appendChild(deleteBtn);

            li.appendChild(deleteBtnContainer);
            li.onclick = () => {
                displayNoteContent(note); // 傳遞整個筆記對象
                editNoteId = note.id; // 儲存被點擊的筆記 ID
            };

            notesList.appendChild(li);
        });
    }
}


// 在更新筆記內容的函數中，使用 Local Storage 儲存內容
function updateNoteContent(note, updatedContent) {
    note.content = updatedContent; // 更新特定筆記的內容
    // 將內容存儲到 Local Storage
    localStorage.setItem('noteContent_' + note.id, updatedContent);
}

// 在顯示筆記內容的函數中，從 Local Storage 讀取內容
function displayNoteContent(note) {
    const noteContent = document.getElementById('noteContent');
    noteContent.innerHTML = ''; // 清空內容
    const textareaContainer = document.createElement('div');

    const textarea = document.createElement('textarea');
    textarea.rows = '20';
    textarea.cols = '80';
    textarea.style.fontSize = '16px'; // 初始化文字大小
    textarea.style.color = 'black'; // 初始化文字顏色
    textarea.value = localStorage.getItem('noteContent_' + note.id) || note.content; // 讀取 Local Storage 內容或使用筆記的內容

    textarea.addEventListener('input', function () {
        updateNoteContent(note, this.value); // 更新筆記內容並儲存到 Local Storage
    });

    const addTextBtn = document.createElement('button');
    addTextBtn.textContent = '新增筆記';
    addTextBtn.onclick = createNote;

    const fontSizeSelect = document.createElement('select');
    fontSizeSelect.id = 'fontSize';
    fontSizeSelect.onchange = changeFontSize;
    const fontSizeOptions = ['12px', '16px', '20px'];
    fontSizeOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontSizeSelect.appendChild(optionElement);
    });

    const fontColorSelect = document.createElement('select');
    fontColorSelect.id = 'fontColor';
    fontColorSelect.onchange = changeFontColor;
    const fontColorOptions = ['black', 'red', 'blue'];
    fontColorOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontColorSelect.appendChild(optionElement);
    });

    textareaContainer.appendChild(textarea);
    textareaContainer.appendChild(addTextBtn);
    textareaContainer.appendChild(fontSizeSelect);
    textareaContainer.appendChild(fontColorSelect);
    noteContent.appendChild(textareaContainer);
}

function deleteNoteFromNotebook(notebookIndex, noteIndex) {
    notebooks[notebookIndex].notesLists.splice(noteIndex, 1);
    displayNotes(); // 重新显示笔记列表
}


// 更改文字大小
function changeFontSize() {
    const noteContent = document.getElementById('noteContent');
    const fontSizeSelect = document.getElementById('fontSize');
    noteContent.querySelector('textarea').style.fontSize = fontSizeSelect.value;
}

// 更改文字顏色
function changeFontColor() {
    const noteContent = document.getElementById('noteContent');
    const fontColorSelect = document.getElementById('fontColor');
    noteContent.querySelector('textarea').style.color = fontColorSelect.value;
}


// 初始化
let editNoteId = null; // 記錄被選中的筆記
displayNoteBooks();
displayNotes();
displayNoteContent('');
