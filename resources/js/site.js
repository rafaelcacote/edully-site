import '../css/site.css';

const PRICE_PER_STUDENT = 2.5;
const ANNUAL_BILLED_MONTHS = 10;

const currency = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2,
});

const integer = new Intl.NumberFormat('pt-BR');

function setupMobileMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');

    if (!toggle || !menu) {
        return;
    }

    const close = () => {
        menu.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
    };

    toggle.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden', isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
    });

    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', close));
    document.addEventListener('keydown', (event) => event.key === 'Escape' && close());
}

function setupStickyHeader() {
    const header = document.querySelector('[data-header]');

    if (!header) {
        return;
    }

    const update = () => {
        header.classList.toggle('border-ink-200', window.scrollY > 8);
        header.classList.toggle('shadow-soft', window.scrollY > 8);
        header.classList.toggle('border-transparent', window.scrollY <= 8);
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
}

function setupReveal() {
    const targets = document.querySelectorAll('.reveal');

    if (!targets.length || !('IntersectionObserver' in window)) {
        targets.forEach((target) => target.classList.add('is-visible'));

        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '0px 0px -12% 0px', threshold: 0.08 },
    );

    targets.forEach((target) => observer.observe(target));
}

function setupPriceCalculator() {
    const slider = document.querySelector('[data-price-slider]');

    if (!slider) {
        return;
    }

    const studentsOutput = document.querySelector('[data-price-students]');
    const totalOutput = document.querySelector('[data-price-total]');
    const perStudentOutput = document.querySelector('[data-price-per-student]');
    const periodOutput = document.querySelector('[data-price-period]');
    const savingsOutput = document.querySelector('[data-price-savings]');
    const cycleInputs = document.querySelectorAll('[data-price-cycle]');

    const paintTrack = () => {
        const min = Number(slider.min);
        const percent = ((Number(slider.value) - min) / (Number(slider.max) - min)) * 100;
        slider.style.backgroundSize = `${percent}% 100%`;
    };

    const render = () => {
        const students = Number(slider.value);
        const selected = document.querySelector('[data-price-cycle]:checked');
        const isAnnual = selected?.value === 'anual';
        const monthlyFull = students * PRICE_PER_STUDENT;
        const monthlyEffective = isAnnual ? (monthlyFull * ANNUAL_BILLED_MONTHS) / 12 : monthlyFull;

        if (studentsOutput) {
            studentsOutput.textContent = integer.format(students);
        }

        if (totalOutput) {
            totalOutput.textContent = currency.format(isAnnual ? monthlyFull * ANNUAL_BILLED_MONTHS : monthlyFull);
        }

        if (perStudentOutput) {
            perStudentOutput.textContent = currency.format(monthlyEffective / students);
        }

        if (periodOutput) {
            periodOutput.textContent = isAnnual ? 'por ano' : 'por mês';
        }

        if (savingsOutput) {
            savingsOutput.textContent = isAnnual
                ? `Você economiza ${currency.format(monthlyFull * 2)} por ano`
                : `Equivale a ${currency.format(PRICE_PER_STUDENT)} por aluno`;
        }

        paintTrack();
    };

    slider.addEventListener('input', render);
    cycleInputs.forEach((input) => input.addEventListener('change', render));
    render();
}

document.addEventListener('DOMContentLoaded', () => {
    setupMobileMenu();
    setupStickyHeader();
    setupReveal();
    setupPriceCalculator();
});
