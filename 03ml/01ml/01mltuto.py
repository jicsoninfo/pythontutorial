from fpdf import FPDF

class PDF(FPDF):
    def header(self):
        self.set_font("Arial", "B", 14)
        self.cell(0, 10, "Complete Machine Learning Guide", ln=True, align="C")

    def chapter_title(self, title):
        self.set_font("Arial", "B", 12)
        self.set_text_color(0)
        self.cell(0, 8, title, ln=True)
        self.ln(2)

    def chapter_body(self, body):
        self.set_font("Arial", "", 10)
        self.multi_cell(0, 6, body)
        self.ln()

    def add_chapter(self, title, body):
        self.add_page()
        self.chapter_title(title)
        self.chapter_body(body)

pdf = PDF()
pdf.set_auto_page_break(auto=True, margin=15)

# Full content
sections = [
    ("What is Machine Learning", 
     "Machine Learning (ML) is a subset of Artificial Intelligence (AI) that enables computers to learn from data "
     "and make decisions or predictions without being explicitly programmed."),
    
    ("Main Categories of ML", 
     "1. Supervised Learning:\n"
     "   - Learns from labeled data.\n"
     "   - Examples: spam detection, house price prediction.\n"
     "   - Algorithms: Linear Regression, Logistic Regression, Decision Trees, SVM, KNN, Naive Bayes, Neural Networks.\n\n"
     "2. Unsupervised Learning:\n"
     "   - Learns from unlabeled data by identifying patterns.\n"
     "   - Examples: customer segmentation, anomaly detection.\n"
     "   - Algorithms: K-Means, Hierarchical Clustering, PCA, DBSCAN.\n\n"
     "3. Semi-Supervised Learning:\n"
     "   - Uses a small amount of labeled data and a large amount of unlabeled data.\n\n"
     "4. Reinforcement Learning:\n"
     "   - Learns by interacting with the environment and receiving feedback (reward/punishment).\n"
     "   - Concepts: Agent, Environment, Reward, Q-Learning, Deep Q Networks."),

    ("Core Topics in ML", 
     "1. Data Preprocessing: Handle missing data, encode categorical variables, scale features.\n"
     "2. Feature Engineering: Creating or selecting important variables.\n"
     "3. Model Training: Using algorithms to learn from data.\n"
     "4. Model Evaluation:\n"
     "   - Classification: Accuracy, Precision, Recall, F1-Score, Confusion Matrix.\n"
     "   - Regression: MAE, MSE, RMSE, R².\n"
     "5. Cross-Validation: Split data multiple ways to check model robustness.\n"
     "6. Hyperparameter Tuning: Use Grid Search or Random Search to optimize model settings.\n"
     "7. Underfitting & Overfitting: Balance between too simple or too complex models.\n"
     "8. Ensemble Learning: Combine models for better performance (Bagging, Boosting, Stacking).\n"
     "9. Deep Learning: Neural networks with many layers (CNNs, RNNs, etc.)."),

    ("Tools & Libraries", 
     "- Languages: Python, R\n"
     "- Libraries: Scikit-learn, TensorFlow, Keras, PyTorch, Pandas, NumPy, Matplotlib"),

    ("Advanced Topics", 
     "- Natural Language Processing (NLP): Text classification, sentiment analysis, transformers.\n"
     "- Computer Vision: Image classification, object detection.\n"
     "- Transfer Learning: Reusing pre-trained models on new tasks.\n"
     "- Generative Models: GANs, VAEs.\n"
     "- AutoML: Automates model selection and tuning.\n"
     "- Explainable AI (XAI): Tools like SHAP, LIME for interpreting models.\n"
     "- Federated Learning: Training on decentralized data."),

    ("ML Project Workflow", 
     "1. Define the problem\n"
     "2. Collect and clean data\n"
     "3. Perform Exploratory Data Analysis (EDA)\n"
     "4. Choose suitable ML model(s)\n"
     "5. Train the model\n"
     "6. Evaluate the model\n"
     "7. Tune hyperparameters\n"
     "8. Deploy the model\n"
     "9. Monitor and retrain as needed")
]

for title, body in sections:
    pdf.add_chapter(title, body)

pdf.output("ML_Complete_Overview.pdf")
