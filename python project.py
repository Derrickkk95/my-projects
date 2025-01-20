import nltk
from nltk.tokenize import word_tokenize

# Download the punkt tokenizer if needed
nltk.download('punkt_tab')

# Define keywords and responses
responses = {
    "hours": "Our store is open Monday to Friday from 9 AM to 8 PM, and Saturday from 10 AM to 6 PM.",
    "running_shoes": "Yes, we have a variety of running shoes in stock. Visit our website or store to check the collection.",
    "order_status": "Please provide your order ID, or visit our website’s 'Order Tracking' section.",
    "return_policy": "We accept returns within 30 days of purchase with the original receipt and if the shoes are unused.",
    "discounts": "We offer seasonal discounts. Sign up for our newsletter to stay updated on special offers!",
    "exchange": "Yes, exchanges are allowed within 15 days with the original packaging.",
    "location": "Our store is located at 123 Shoe Avenue, Fashion City.",
    "kids' shoes": "Yes, we have a wide selection of kids' shoes in various sizes and styles."
}

# Function to process user input
def get_response(user_input):
    # Tokenize user input to find keywords
    tokens = word_tokenize(user_input.lower())
    
    # Check for keywords in the user input and return the corresponding response
    for key in responses.keys():
        if key in tokens:
            return responses[key]
    
    # Default response if no keywords are found
    return "I'm sorry, I didn't understand that. Can I help you with store hours, product availability, order status, or returns?"

# Chatbot interaction loop
print("Welcome to ShoeStoreBot! How can I assist you today?")
while True:
    user_input = input("You: ")
    if user_input.lower() in ["exit", "quit", "bye"]:
        print("ShoeStoreBot: Thank you for visiting! Have a great day!")
        break
    response = get_response(user_input)
    print("ShoeStoreBot:", response)
