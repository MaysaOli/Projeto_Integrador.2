from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/report', methods=['POST'])
def report():
    # Aqui você pode processar os dados do formulário
    # Exemplo: print(request.form)
    return redirect(url_for('home'))

if __name__ == '__main__':
    app.run(debug=True)



