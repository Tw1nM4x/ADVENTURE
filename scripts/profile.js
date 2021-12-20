function NewAvatar(){
  let LoadAvatar = document.querySelector('.load-avatar');
  if(LoadAvatar.style.display == 'flex')
  LoadAvatar.style.display = 'none';
  else
  LoadAvatar.style.display = 'flex';
}

document.addEventListener('DOMContentLoaded', () => {

    const forms = document.querySelectorAll('form');
    const inputFile = document.querySelectorAll('.upload-file__input');

    /////////// Кнопка «Прикрепить файл» ///////////
    inputFile.forEach(function(el) {
        let textSelector = document.querySelector('.upload-file__text');
        let fileList;
        // Событие выбора файла
        el.addEventListener('change', function (e) {
            fileList = [];
            for (let i = 0; i < 1; i++) {
                fileList.push(el.files[i]);
            }
            fileList.forEach(file => {
                uploadFile(file);
            });
        });
        // Проверяем размер файлов и выводим название
        const uploadFile = (file) => {
            // файла <5 Мб
            if (file.size > 5 * 1024 * 1024) {
                alert('Файл должен быть не более 5 МБ.');
                return;
            }
            textSelector.textContent = file.name;
        }
    });
});
