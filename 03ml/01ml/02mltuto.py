import matplotlib.pyplot as plt
import networkx as nx

G = nx.DiGraph()

# Main topic
G.add_node("Machine Learning")

# Branches and sub-branches
branches = {
    "Machine Learning": [
        "Supervised Learning", "Unsupervised Learning", "Reinforcement Learning",
        "Semi-Supervised Learning", "Core Topics", "Advanced Topics", 
        "Tools & Libraries", "ML Workflow"
    ],
    "Supervised Learning": ["Regression", "Classification", "Algorithms"],
    "Unsupervised Learning": ["Clustering", "Dimensionality Reduction"],
    "Reinforcement Learning": ["Agent", "Environment", "Reward", "Q-Learning"],
    "Core Topics": [
        "Data Preprocessing", "Feature Engineering", "Model Training",
        "Model Evaluation", "Cross-Validation", "Overfitting & Underfitting",
        "Ensemble Learning", "Deep Learning"
    ],
    "Advanced Topics": [
        "NLP", "Computer Vision", "Transfer Learning", 
        "Generative Models", "AutoML", "Explainable AI", "Federated Learning"
    ],
    "Tools & Libraries": ["Python", "Scikit-learn", "TensorFlow", "PyTorch", "Pandas"],
    "ML Workflow": [
        "Problem Definition", "Data Collection", "EDA", "Model Selection",
        "Training", "Evaluation", "Deployment", "Monitoring"
    ]
}

# Add nodes and edges
for parent, children in branches.items():
    for child in children:
        G.add_node(child)
        G.add_edge(parent, child)

# Draw the graph
plt.figure(figsize=(18, 12))
pos = nx.spring_layout(G, k=0.5, iterations=50)
nx.draw(G, pos, with_labels=True, node_size=2000, node_color="lightblue",
        font_size=10, font_weight="bold", edge_color="gray", arrows=True)

plt.title("Machine Learning Mind Map", fontsize=16)
plt.axis("off")
plt.savefig("Machine_Learning_Mind_Map.png", bbox_inches="tight")
plt.show()
