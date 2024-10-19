const questions = [
    'Como foi seu atendimento na recepção?',
    'Como foi seu atendimento pela equipe de enfermagem?',
    'Como foi o atendimento do seu médico?',
    'Como você avalia o profissionalismo da equipe?',
    'Qual nota daria para a limpeza e higienização do ambiente?',
    'Qual nota daria para as refeições oferecidas?',
    'De modo geral, qual nota daria para as instalações?',
    'Como avaliaria a sua privacidade?',
    'O que achou do estacionamento do hospital?',
    'O que achou do serviço de internet?'
];

let currentQuestionIndex = 0;
const questionLabel = document.getElementById('question-label');
const nextBtn = document.getElementById('next-btn');
let selectedRatings = [];

function loadQuestion() {
    questionLabel.textContent = questions[currentQuestionIndex];
    nextBtn.disabled = true;
}

document.querySelectorAll('.rating-btn').forEach(button => {
    button.addEventListener('click', () => {

        selectedRatings[currentQuestionIndex] = button.value;

        nextBtn.disabled = false;

        document.querySelectorAll('.rating-btn').forEach(btn => btn.classList.remove('selected'));
        button.classList.add('selected');
    });
});

nextBtn.addEventListener('click', () => {
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        loadQuestion();
        document.querySelectorAll('.rating-btn').forEach(btn => btn.classList.remove('selected'));
    } 
    else if (currentQuestionIndex === questions.length - 1) {
        currentQuestionIndex++;
        document.getElementById('question-container').style.display = 'none';
        document.getElementById('feedback-container').style.display = 'block';
        nextBtn.textContent = 'Enviar';
    } 
    else {
        const feedback = document.getElementById('feedback').value;

        document.querySelector('.container').innerHTML = `
            <img src="/public/img/logo-white.png" alt="Logo do Hospital" class="logo">
            <h1>Pesquisa de Satisfação</h1>
            <h2>Obrigado por sua avaliação!</h2>
            <p class="disclaimer">Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
        `;
    }
});

loadQuestion();
